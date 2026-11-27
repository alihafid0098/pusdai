---
name: gsk-aidrive
version: 1.0.0
description: 'Genspark AI Drive: manage files and folders; search, read, upload and
  share. Download web files, audio and YouTube videos. Web downloader actions: download_video
  (YouTube), download_audio and download_file. Use wo-peer to read and edit live Office
  files.'
metadata:
  category: general
  generated_by: genspark_tool_cli/generate_skills.py
  requires:
    bins:
    - gsk
  cliHelp: gsk drive --help
---

# gsk-aidrive

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

Read, search and manage the user's files with `gsk drive` (`gsk aidrive` is the same command).
Do not assume the user has any shared locations. Discover only what the task needs.

**SOURCE DISCOVERY:** `../gsk-second-brain/SKILL.md` explains Notes versus files and current-call permissions.
With a selected source/id or a supplied link, use it directly instead of listing every location.

## Everyday file operations

```bash
gsk drive ls --workspace my_drive
gsk drive ls --workspace shared_with_me
gsk drive find --scope all -q '<filename>'
gsk drive read --url '<file link>'
gsk drive tree --url '<folder link>'
gsk drive upload --local_file '<local file>' --upload_path '/<filename>' --on-conflict error
```

Prefer a returned file `id`/`entry_id` over retyping its name. `ls` and `find`
show ID, Workspace and Source columns: read with `gsk drive read --id '<file-id>'`
and that row's workspace/source (`id_locator`), omitting an absent source.
Following a shortcut can change the source; use the returned address instead
of the original listing's source. For path-based operations, reuse the returned
`entry_locator` workspace, source and path together. When only a path is available,
copy it exactly, including spaces and punctuation; never construct a Drive URL
from a display name. A file shared with the user can be read without access to its
whole parent location. Call the tool under the current identity and follow any
refusal; a share or shortcut never grants more than the source permits.

Read the actual content before answering. Follow each result's `next_read`
flags until exhausted when the task needs the full document. Search `coverage`
and response `contains_full_document` describe different things: a complete
index does not mean the response contains the entire file. Report the scope
checked after a miss. Return the tool's user-facing `url`, never an internal
download URL. Existing Office files are edited through `wo-peer`, not by
downloading and uploading a replacement.

On `Entry not available`, first check the selected directory or run `find` and
retry with the returned ID. A failed path lookup alone does not establish a
permission denial; stop when the tool explicitly denies access. Preserve JSON
results and use `--char_limit` and cursors instead of piping to `head` or `tail`:
the last command's exit code can hide a failed Drive call.

## Load the relevant reference when needed

Read [the command reference](command-reference.md) when the user
names a shared project or team location, a selected resource or tool result
identifies one, or the task needs sharing, document databases, source management or advanced
flags. It contains those locations' workflows, permissions and full schemas.
Do not read it just to explain where a personal file lives.

Use `gsk drive <action> --help` for the live flags. For a web download, run
`gsk drive download_file --help`, `download_audio --help` or `download_video --help`.
For document creation, delivery and editing, read the relevant sections of
`../gsk-second-brain/SKILL.md` and the document editor's guide.
