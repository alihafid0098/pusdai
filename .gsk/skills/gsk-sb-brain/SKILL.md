---
name: gsk-sb-brain
version: 1.0.0
description: 'Discover, search and read Second Brain Notes: personal notes and uploads,
  archived email, meeting records, Notion imports and past conversations. Browse source
  repositories and file trees, read original files, and inspect revision history.'
metadata:
  category: general
  generated_by: genspark_tool_cli/generate_skills.py
  requires:
    bins:
    - gsk
  cliHelp: gsk sb-brain --help
---

# gsk-sb-brain

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

**SOURCE DISCOVERY:** `../gsk-second-brain/SKILL.md` explains Notes sources and layouts. With a known source and file, use the commands below directly; consult that guide for source discovery and shared workflows.

Discover, search and read Second Brain Notes: personal notes and uploads, archived email, meeting records, Notion imports and past conversations. Browse source repositories and file trees, read original files, and inspect revision history.

## Usage

```bash
gsk sb-brain [options]
```

## What this command reads

`gsk sb-brain` opens the **Notes** half of the user's Second Brain: personal
notes and uploads, archived email, meeting records, Notion imports and past
Genspark conversations. Available personal and team sources appear in
`list-repos` with their mount status.

| Task | Action |
|---|---|
| Discover source repositories | `list-repos` |
| Browse folders and files in a source | `ls -s <source> -p <path>` |
| Find original passages | `grep -s <source> -q "<short keyword>"` |
| Read a selected file or search hit | `read -s <source> --repo_id <repo_id> -p <path>` |
| Inspect a source's revision history | `log -s <source>` |

Known source/file references go directly to `read`. For source layouts,
profiles and Notes writing workflows, see `../gsk-second-brain/SKILL.md`.

- `grep` uses fixed string, case-insensitive matching. Use a short distinctive
  keyword; a long phrase matches a single line exactly.
- Open a search hit with `read -s <hit.source> --repo_id <hit.repo_id> --ref <hit.ref> -p <hit.path>`.
  The `repo_id` selects the account when a source contains several repositories.
- `grep` reports completion and errors per repository in `repos`. For a needed
  gap, retry the affected repository with `--repo_id` and a narrow
  query or path; `truncated` marks the shared result cap.

`read`, `ls` and `log` identify the resolved `source`, `repo_id` and `ref`.
A file read also includes its `path` and commit `head` alongside the content.

## Flags

| Flag | Required | Description |
|------|----------|-------------|
| `<action>` (positional) | Yes | Action to perform. (string, one of: list-repos, ls, read, grep, log) |
| `-s`, `--source` | No | Source name: memo, gmail, outlook, meeting, notion, team, custom, project_history. Required for ls, read, log. Optional for grep (omit to search ALL mounted sources). (string) |
| `-p`, `--path` | No | File or directory path within the source repo. Used by ls (optional, defaults to root), read (required) and grep (optional directory prefix that confines the search). (string) |
| `-q`, `--query` | No | Search text for grep (fixed string, case-insensitive; NOT a regex). Required for grep. Use a short distinctive keyword — a long phrase must match a single line exactly. (string) |
| `--ref` | No | Git ref (branch or commit SHA). Defaults to main. Reuse a grep match's ref to read its file. (string) |
| `--repo_id` | No | Repository ID from list-repos or a grep match. Pass the match's repo_id when reading its file. When omitted, selects the source's first repository. (string) |
| `--limit` | No | Max results for log (default 20). (integer) |

## See Also

- [gsk-shared](../gsk-shared/SKILL.md) — Authentication and global flags
