---
name: gsk-calendar-search
version: 1.0.0
description: 'Search events across ALL the user''s calendars at once — every Google
  and Outlook account plus CalDAV (iCloud, Naver) and ICS subscriptions. Matches title,
  location and attendees; omit the query to list every event in the window. Check
  read_coverage: incomplete means a miss is not proof of absence.'
metadata:
  category: general
  generated_by: genspark_tool_cli/generate_skills.py
  requires:
    bins:
    - gsk
  cliHelp: gsk calendar_search --help
---

# gsk-calendar-search

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

Search events across ALL the user's calendars at once — every Google and Outlook account plus CalDAV (iCloud, Naver) and ICS subscriptions. Matches title, location and attendees; omit the query to list every event in the window. Check read_coverage: incomplete means a miss is not proof of absence.

## Usage

```bash
gsk calendar_search [options]
```

## Flags

| Flag | Required | Description |
|------|----------|-------------|
| `<query>` (positional) | No | Keywords; all words must match title, location or attendees. Omit to list every event in the window. (string) |
| `--time_min` | No | Window start, ISO 8601 (a time without an offset is read in 'timezone'). Default: 30 days ago. The window may span at most 366 days — for 'all events matching X' pass a wide window, e.g. 6 months back to 6 months ahead. (string) |
| `--time_max` | No | Window end, ISO 8601: a date-time is exclusive, a bare date (YYYY-MM-DD) includes that whole day. Default: 60 days from today. (string) |
| `--timezone` | No | IANA timezone for all-day events, offset-less times and the returned local times. Default: the user's timezone. (string) |
| `-a`, `--from_account` | No | Optional: search only this account — a Google or Outlook email, or a CalDAV/ICS source name (as shown in searched_calendars) or its login. Omit to search every calendar. (string) |
| `--limit` | No | Maximum events to return (default 25, max 100). (integer) |

## See Also

- [gsk-shared](../gsk-shared/SKILL.md) — Authentication and global flags
