---
name: gsk-shared
version: 1.0.0
description: "Shared foundation: authentication, global flags, output conventions, and security rules for all GSK CLI skills."
metadata:
  category: foundation
  requires:
    bins:
      - gsk
---

# GSK CLI — Shared Foundation

**PREREQUISITE:** Every GSK skill assumes this document has been read first.

## Installation

```bash
npm install -g @genspark/cli
```

Requires Node.js >= 18.

## Authentication

```bash
# Log in via browser (saves the API key and effective API endpoint)
gsk login

# Or provide an API key directly
export GSK_API_KEY="gsk_..."

# Check current identity
gsk me
```

## Global Flags

| Flag | Env Var | Default | Description |
|------|---------|---------|-------------|
| `--api-key <key>` | `GSK_API_KEY` | — | API key (required) |
| `--base-url <url>` | `GSK_BASE_URL` | `https://www.genspark.ai` | API base URL |
| `--project-id <id>` | `GSK_PROJECT_ID` | — | Project ID for access control |
| `--debug` | — | `false` | Enable debug output |
| `--timeout <ms>` | — | `1800000` | Request timeout (30 min default) |
| `--output <format>` | — | `json` | Output format: `json` or `text` |
| `--refresh` | — | — | Force refresh cached tool schemas |
| `-y`, `--yes` | — | `false` | Auto-confirm confirmation-gated actions (replaces the deprecated `--skip_confirmation`) |
| `--no-input` | — | `false` | Never prompt; a gated action without `--yes` exits 2 with no server call |
| `--config <path>` | `GSK_CONFIG` | `~/.genspark-tool-cli/config.json` | Config profile path |

## Output Conventions

| Stream | Content | Consumer |
|--------|---------|----------|
| **stdout** | JSON result | Programs / AI agents |
| **stderr** | Progress, debug, error messages | Human / logs |

Always parse stdout as JSON. Use `--output text` for human-readable output.

**Do NOT merge stderr into stdout when piping to a JSON parser.** `gsk ... 2>&1 | python3 -c "json.load(sys.stdin)"` fails — the stderr progress/spinner text lands ahead of the JSON and breaks the parse at the very first character (`Expecting value: line 1 column 2`). Pipe only stdout: drop stderr with `2>/dev/null`, or leave it on the terminal. Never `2>&1` a command whose stdout you intend to parse.

## Local File Handling

Most commands that accept URLs also accept local file paths. The CLI automatically uploads local files before passing them to the API:

```bash
gsk analyze "Describe this" -i ./photo.jpg
gsk img "Enhance this" -i ./photo.png -o ./result.png
```

`-o <path>` prechecks writability and creates parent directories; a failed precheck exits `1` without submitting. Exit `4` means generation succeeded but saving failed: use the preserved URLs / `data.download_error` to retry only the download; never regenerate.

### Task attachments (`gsk task create ... --file`)

`--file <paths|urls...>` is a CLI-only option (the server's `file_urls` parameter is filled from it and is not listed in the gsk-create-task skill). Local paths are uploaded first; `http(s)://`, `aidrive://` and file-wrapper URLs pass through unchanged. The files are NOT pasted into the query: each one becomes a chat attachment on the task's first user message (same shape as attaching a file in the web composer), so images are vision-visible and other files arrive as named documents the agent reads with its tools.

```bash
# Media agent: reference images, video, audio and documents all travel as attachments
gsk task create media_agent --task_name "Solar teaser" \
  --query "One key-art image in the style of the reference image, then a 5-second clip from it with the attached voice line as the audio track" \
  --instructions "Audience: kids 8-12; follow brief.pdf" \
  --file ./ref.png ./clip.mp4 ./voice.mp3 ./brief.pdf

# Sheets: CSV / Excel files are imported into the workbook
gsk task create sheets --task_name "Q3" --query "Summarize the data" --instructions "One chart" --file ./sales.csv
```

| Task Type | What `--file` means |
|-----------|---------------------|
| media_agent | Reference material (images / video / audio / documents) the Media agent can view, transcribe, read and reuse |
| design | Reference images / documents for the Design agent (attached to the first message; `gsk task ask <pid> -m … --file` adds more on a follow-up) |
| sheets | CSV / Excel import |
| other types | Attached as documents; mention them in the query so the agent knows what to do with them |

### Task agent export (`gsk task create ... -o`)

For task agents (docs, slides, sheets), `-o` follows the run live (implies `--follow`) and exports to standard file formats once it completes:

```bash
gsk task create docs --task_name "Project report" --query "Write a project report" --instructions "Formal tone" -o ./report.docx
gsk task create slides --task_name "Pitch deck" --query "Create a pitch deck" --instructions "10 slides" -o ./deck.pptx
gsk task create sheets --task_name "Budget tracker" --query "Build a budget tracker" --instructions "Monthly view" -o ./budget.xlsx
```

| Task Type | Default Export Format |
|-----------|---------------------|
| docs | DOCX |
| slides | PPTX |
| sheets | XLSX |

In ACP mode (`--acp`), use `session/export` instead — see [gsk-acp-agents](../gsk-acp-agents/SKILL.md).

## Configuration Priority

1. **CLI options** (highest)
2. **Environment variables**
3. **Config file** (`~/.genspark-tool-cli/config.json`)

## Security Rules

- Never expose your API key in shared scripts or logs.
- Use `--project-id` for access control when sharing resources.
- The CLI auto-updates every 4 hours. Disable with `GSK_NO_AUTO_UPDATE=1`.

## Built-in Commands

These commands are implemented in the CLI frontend and have no backend adaptor.

### list-tools

List all available tools.

```bash
gsk list-tools    # or: gsk ls
```

### upload

Upload a local file and get a file wrapper URL for use in other commands.

```bash
gsk upload ./image.png
gsk upload ./document.pdf
```

Returns a JSON object with `upload_url` and `file_wrapper_url`.

### download

Download a file from a file wrapper URL.

```bash
# Get download URL only
gsk download "/api/files/s/abc123"

# Download and save to local file
gsk download "/api/files/s/abc123" -s ./downloaded.png
```

| Flag | Description |
|------|-------------|
| `-s, --save <path>` | Download and save to local file path |

Without `--save` the response carries `download_url`, a signed URL you can hand to `curl` or an external service, and `expires_at`, the UTC time that URL stops working (1 to 2 hours after the call). With `--save` the response lists only the saved file — `file_name`, `content_type`, `local_path`, `size_bytes` — and no `download_url`/`original_url`.

### init-opencode

Generate an `opencode.json` config file for [OpenCode](https://opencode.ai), pre-configured to use Genspark's LLM proxy. The server supplies model-specific reasoning variants; select them in OpenCode. MiniMax M3 offers off/always-thinking modes, not depth levels. Unsupported or unverified effort controls are not advertised.

```bash
gsk init-opencode
gsk init-opencode --model claude-sonnet-4-6
gsk init-opencode -o ./my-project/opencode.json
```

| Flag | Default | Description |
|------|---------|-------------|
| `--model <name>` | Server-selected | Default model for OpenCode |
| `-o, --out <path>` | `opencode.json` | Output file path |

Regeneration overwrites the output file; preserve custom settings first.

### init-skills

Sync GSK skill documents into the current project for AI agent discovery. Generates a `CONTEXT.md` entry point and optionally agent-specific config files.

```bash
# Copy skills to .gsk/skills/ and generate CONTEXT.md
gsk init-skills

# Also generate .claude/ config for Claude Code
gsk init-skills --agent claude

# Generate config for all supported agents
gsk init-skills --agent all

# Custom output directory
gsk init-skills -o ./docs/gsk-skills
```

| Flag | Default | Description |
|------|---------|-------------|
| `-o, --out <dir>` | `.gsk/skills` | Output directory for skills |
| `--agent <type>` | — | Generate agent config: `claude`, `gemini`, or `all` |

**Generated files:**
- `CONTEXT.md` — Universal agent entry point listing all available skills
- `.claude/settings.json` — Claude Code context includes (when `--agent claude`)
- `gemini-extension.json` — Gemini extension config (when `--agent gemini`)

### init-genspark-code-skills

Fetch the genspark-code (code sandbox) skill documents into the current project for AI agent discovery. Covers the full developer-skill set a sandbox can install — web / Cloudflare / Flutter / Shopify / HTML5-game development, hosted deployment, and GitHub workflows. The bundle is served by the backend, so newly edited skill docs reach released CLIs without a package update.

```bash
# Copy skills to .genspark-code/skills/
gsk init-genspark-code-skills

# Custom output directory
gsk init-genspark-code-skills -o ./docs/genspark-code-skills
```

| Flag | Default | Description |
|------|---------|-------------|
| `-o, --out <dir>` | `.genspark-code/skills` | Output directory for skills |

A built-in whose requirement the caller doesn't satisfy — the org-only `gsk-hosted-org-member` for a non-member — is omitted, so an agent never sees docs for a capability the server would refuse. Unlike `init-skills`, this command does not generate or touch `CONTEXT.md`.

### AI Drive: local file upload

The `gsk drive upload` command supports streaming local files directly to AI Drive via `--local_file`. This is a CLI-only feature (not in the backend API).

```bash
# Upload a local file to AI Drive (streaming, supports 100MB+ files)
gsk drive upload --local_file ./report.pdf --upload_path /docs/report.pdf
gsk drive upload --local_file ./photo.png              # defaults to /photo.png
gsk drive upload --local_file ./doc.pdf --upload_path /docs/doc.pdf --overwrite true   # edit in place: same id, same link
gsk drive upload --local_file ./report.pdf --upload_path /docs/report.pdf --to ann@example.com   # upload and share; reply carries the link
```

| Flag | Description |
|------|-------------|
| `--local_file <path>` | Local file path to upload (streaming, no size limit) |
| `--overwrite true` | Replace the existing file at the destination path in place; the file keeps its id and share link (`--override` is the older spelling) |
| `--to`, `--general_access` | Share the uploaded file right away (My Drive); the reply's `url` opens for those people |

## Connectors (integrations)

For ANY third-party integration (email, chat, CRM, files, custom MCP
servers), use the unified flow in `../gsk-connector/SKILL.md`:
`gsk connector list` / `search` → advertised `guide <id>` → `call <id> -t <tool> -a '<json>'`.
Read an advertised guide once and reuse it within the session; if none is advertised, continue with tool discovery.
Call directly when the guide documents the required tool and arguments.
Use `tools <id>` only when no guide is advertised, it returns `not_available`,
needed tool or argument details are missing, or a call reports an unknown tool
or schema mismatch. Respect connection and enablement hints, installed-ID
instructions, and tool-specific safety requirements.
Never assume a connector is missing without running `gsk connector search` first.
The `list` and `search` commands are available regardless of the unified
invocation rollout. If `guide`, `tools`, or `call` is unavailable
(unknown-command error), use the discovered binding through `gsk mcp tools`
/ `gsk mcp call` or the per-service commands from the `gsk-<service>` skills.
