---
name: gsk-calendar-source
version: 1.0.0
description: 'Connected CalDAV/ICS calendar sources. Actions: sources, list, get,
  create, modify, delete.'
metadata:
  category: general
  generated_by: genspark_tool_cli/generate_skills.py
  requires:
    bins:
    - gsk
  cliHelp: gsk calendar_source --help
---

# gsk-calendar-source

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

Connected CalDAV/ICS calendar sources. Actions: sources, list, get, create, modify, delete.

## Usage

```bash
gsk calendar_source [options]
```

## Flags

| Flag | Required | Description |
|------|----------|-------------|
| `<action>` (positional) | Yes |  (string, one of: sources, list, get, create, modify, delete) |
| `--calendar_id` | No |  (string) |
| `--event_id` | No |  (string) |
| `--etag` | No |  (string) |
| `--scope` | No |  (string, one of: single, all, default: `single`) |
| `--start` | No | ISO-8601 window start with offset (list). (string) |
| `--end` | No | ISO-8601 window end with offset (list). (string) |
| `--limit` | No |  (integer, default: `50`) |
| `--refresh` | No |  (boolean, default: `False`) |
| `--fields` | No | Event API fields: title, description, description_content_type, location, start_time, end_time, timezone, is_all_day, recurrence, reminder. Create additionally requires a stable draft_id for retry deduplication. (object) |

## See Also

- [gsk-shared](../gsk-shared/SKILL.md) — Authentication and global flags
