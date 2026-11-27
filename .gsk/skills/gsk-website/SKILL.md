---
name: gsk-website
version: 0.2.0
description: "Local static site import (not the ACP/AI website builder agent of the same name): upload a site you already built locally (index.html + assets, e.g. dist/) as a private Genspark website project, then preview, update, check status and publish it."
metadata:
  category: developer
  requires:
    bins:
      - gsk
---

# gsk-website

Use this when YOU wrote the site and want it hosted on Genspark. The folder you
upload becomes a private website project with preview, editor, Files and
Publish tabs on its project page. Genspark doesn't build, install or run
anything. It serves exactly the files you upload. This guide is about importing
local code. It is not the remote AI website agent (`gsk-website` in the ACP
agent list), and not the legacy AI builder (`gsk task create website --help`).

## Before you start

- **Sign in.** Run `gsk login`, or set `GSK_API_KEY`. `gsk me` shows who you
  are. Add `--base-url <url>` for another Genspark environment.
- **Flags and output.** Run `gsk website <command> --help` to see a command's
  flags. Results are JSON on stdout; progress goes to stderr.
- **Help offline.** `gsk website skill` prints this guide without a login, and
  `gsk website skill --path` prints where it is stored.

## What can be uploaded

- **A static site.** A folder with `index.html` at its top level, plus its CSS,
  JS, images, fonts and data files. There is no backend: no server code, no
  database, no form storage. A site that needs a server belongs on a developer
  project (`gsk project create --help`).
- **Framework projects.** Build them locally and upload the output folder
  (`dist/`, `build/`, `out/`), never the source checkout. Nothing runs
  remotely: no Node, no build step, no ports.
- **Limits.** 1000 files, 30 MiB zipped, 60 MiB unpacked. Images and other
  binary files keep their exact bytes.
- **Refused and skipped files.** `.meta/` and `.tables/` at the top level are
  reserved for the project's settings and are refused. Tooling directories such
  as `.git` and `node_modules` are skipped and listed in `skipped_paths`.
  Credential files such as `.env*` and private keys stop the upload; remove them
  from the output folder. Ordinary site assets such as `.log` files and Keynote
  `.key` downloads are preserved. On update, remote copies of skipped paths are
  removed along with other files missing from the upload.

## Make the build work under the preview path

Preview serves your files under
`/api/code_sandbox_light_git/preview/<project_id>/`. It returns the exact file
requested, and `index.html` only for the project root. That has three
consequences:

- **Use relative asset paths.** An absolute `/assets/app.js` points outside the
  preview path and breaks. For Vite, build with `vite build --base=./` or set
  `base: './'`. For other tools, set the equivalent relative base or public
  path.
- **Link real files.** Write `about.html` or `about/index.html`, not `/about`.
  A directory URL without a file name gets no `index.html`.
- **No client-side history routing.** A refresh or deep link to a client route
  returns 404 because there is no SPA fallback. Use hash routing, or one HTML
  file per page. A Next.js static export needs `output: 'export'`, a relative
  asset prefix and `trailingSlash: true`. Check it in preview before you rely
  on it.

## Commands

```bash
gsk website create --source ./dist --name "Acme landing page"
#   -> project_id, preview_url, project_url, files, head_sha
#   Binds the CURRENT directory (.gsk/project.json, kind=website), not --source.
#   --no-bind skips the binding; next_step always names --project-id.

gsk website update --project-id <id> --source ./dist [--message "Fix pricing"]
#   Replaces the WHOLE site in one commit: files missing from ./dist are deleted.
#   Without --project-id it uses the current directory's website binding
#   (never GSK_PROJECT_ID). --project-id may also go before `website`.

gsk website status --project-id <id>
#   Links, file count, head_sha, and hosted.is_deployed / hosted.url /
#   hosted.deployed_commit. hosted.is_current is false when the live site is
#   an older commit than head_sha (null when the live commit is unknown).
```

- **The project is private.** `preview_url` opens for the owner when they are
  signed in. Send the user `project_url`.
- **Creation isn't retried.** `create` runs once. If it reports that the result
  is unknown, check the project list before you create again.
- **Updates overwrite.** `update` only rewrites projects made by
  `gsk website create`, and it replaces the edits someone made in the project
  editor. A `409 conflict` means someone else changed the project. Run
  `status`, agree on the edits with the user, then submit again. Never retry
  blindly.
- **Text size before publishing.** A hosted deploy inlines your text files
  into one script, while images and other binaries are served separately. The
  CLI warns when raw text passes about 1 MiB. Escaping makes the real script
  larger, so staying under that number doesn't guarantee a deploy succeeds.
  Minify, and move large data out of text files.

## Publish

Creating or updating a project never makes it public. Use the existing hosted
flow (`gsk hosted deploy --help`):

```bash
gsk hosted deploy --project_id <project_id>          # returns pending_action_id
gsk hosted action_approve --id <pending_action_id>   # only after the user said yes
gsk hosted action_wait --id <pending_action_id>      # completed result carries the live URL
```

`--project_id` names the website to publish and works from a Super Agent
sandbox too: the sandbox's own project stays the caller. The deploy publishes
the website commit that was current when you submitted it (`diff_preview.
deploy_commit`), so an update made while approval is pending is not published
by it. Publishing needs a Plus plan or higher and the account's normal
approvals. To publish a new revision, run `gsk website update`, then
`gsk hosted deploy --project_id <project_id>` again.

## GenTeam agents

Agents inside GenTeam use `de website-create` / `de website-update`.
`gsk website create/update` refuses GenTeam agent keys.
