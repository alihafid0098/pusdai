---
name: gsk-inbox-todos
version: 1.0.0
description: 'List the user''s AI Inbox / GenMail homepage TODOs — the ''Needs you
  / Upcoming / Worth a look / FYI'' items the email brain derives from their mail
  and calendar. This is the USER''s task list, not the assistant''s own scratchpad
  todo tool. Read-only. With neither --hours nor --since, the default source-arrival
  window is 7 days, not all history. Use an explicit --since for an older range. For
  the desktop homepage window, pass --since at 18:00 on the most recent Monday-Friday
  strictly before today in the user''s timezone, plus --scope all --include_replied
  true --include_categories true. Use --view taxonomy for current category settings
  without a TODO-window read. Use --view counts and its whole-window kind/category/status/stale_reason
  breakdown for statistics; never count only one page. Join categories against the
  current taxonomy. Default list: Needs you, past 7 days, up to 20 compact rows with
  exact totals and a cursor. Use --scope all for all categories. Use --view counts
  for totals only, --view full for detailed pages, or --todo_id / --todo_ids (comma-separated,
  up to 20) for full items by id. Defaults: compact 20 rows; full 10 rows. Only --all
  true removes pagination within the selected scope; --scope all --view full --all
  true restores the old full result. Use --category for exact category ids or --category_name
  for a unique current display name, --kind mail for email-only tasks and --status
  active for pending items. Use --cursor for the next page. count is page size; total_count
  is the window total.'
metadata:
  category: inbox
  generated_by: genspark_tool_cli/generate_skills.py
  requires:
    bins:
    - gsk
  cliHelp: gsk inbox todos --help
---

# gsk-inbox-todos

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

List the user's AI Inbox / GenMail homepage TODOs — the 'Needs you / Upcoming / Worth a look / FYI' items the email brain derives from their mail and calendar. This is the USER's task list, not the assistant's own scratchpad todo tool. Read-only. With neither --hours nor --since, the default source-arrival window is 7 days, not all history. Use an explicit --since for an older range. For the desktop homepage window, pass --since at 18:00 on the most recent Monday-Friday strictly before today in the user's timezone, plus --scope all --include_replied true --include_categories true. Use --view taxonomy for current category settings without a TODO-window read. Use --view counts and its whole-window kind/category/status/stale_reason breakdown for statistics; never count only one page. Join categories against the current taxonomy. Default list: Needs you, past 7 days, up to 20 compact rows with exact totals and a cursor. Use --scope all for all categories. Use --view counts for totals only, --view full for detailed pages, or --todo_id / --todo_ids (comma-separated, up to 20) for full items by id. Defaults: compact 20 rows; full 10 rows. Only --all true removes pagination within the selected scope; --scope all --view full --all true restores the old full result. Use --category for exact category ids or --category_name for a unique current display name, --kind mail for email-only tasks and --status active for pending items. Use --cursor for the next page. count is page size; total_count is the window total.

## Usage

```bash
gsk inbox todos [options]
```

## Choose the read level

The bare command returns the current Needs you category from the past seven
days of source arrival: a first page of up to 20 compact rows, exact window
totals and a `next_cursor`. Start there for "what needs me" and widen only when
the request needs more:

- **Filters apply before paging.** The default can include non-mail and
  completed rows; for pending email add `--kind mail --status active`. `kind`
  is the action, not the source: mail is a reply or forward, calendar an RSVP
  or event, spark a standalone deliverable with no mail action — so a spark row
  is not a pending email even when an email prompted it. In the default
  taxonomy only Needs you and Upcoming ask the user to act; FYI and Other are
  informational.
- **All categories:** `--scope all`. `--all true` only removes pagination
  within the selected scope.
- **Statistics:** one `--scope all --view counts` call. `breakdown` groups the
  whole window by kind/category/status/stale_reason; `matched_breakdown` and
  `matched_count` apply your filters. Sum the groups locally instead of one call
  per group, and add `--include_replied true` to that call if replies matter.
  `count` is the returned page, `total_count` the whole window.
- **A named category:** `--category_name "<current name>"` (custom names
  work) or `--category <id>`. Trust the returned rows; do not re-filter them by
  stored category id. An unknown or ambiguous name, or a missing default
  category, is a configuration error — read `--view taxonomy` (no TODO read),
  never report zero tasks.
- **Details:** compact omits source metadata, briefs and agent prompts. For
  known IDs use `--todo_ids <id1>,<id2>` (up to 20, full rows in `data.todos`
  in the given order, absent IDs in `missing_todo_ids`) or `--todo_id <id>`.
  For the top N with details, use `--view full --limit N` with your filters.
- **Export or topic search:** `gsk inbox todos --scope all --view full --all true > todos.json`,
  then search or filter that file locally. Do not page with cursors to count,
  search or export: every call rebuilds the whole window.
- **Older backlog:** pass an explicit earlier `--since` and say what range you
  covered.
- **Homepage comparison:** `--scope all --since` at 18:00 on the most recent
  Monday–Friday strictly before today in the user's timezone, plus
  `--include_replied true --include_categories true`. The current taxonomy
  order is the category priority; a row's `category_order` can be stale.

## Read rows carefully

Completed rows and replied rows (`status=stale`,
`stale_reason=outbound_replied`, only with `--include_replied true`) are not
pending, and absence from the list is not completion. Countdowns in a summary
("due in 5 days") count from the source date or `first_seen_at`, not from now.
Read the original mail or calendar item before acting on a TODO, and copy IDs
from the output — the top-level `id`, never a mail thread ID.

If gsk rejects one of these flags as an unknown option, the local command cache
predates it: rerun that command once as `gsk --refresh inbox todos ...`.

## Flags

| Flag | Required | Description |
|------|----------|-------------|
| `--scope` | No | Row lists default to Needs you in the selected arrival window. Use all for all categories; all=true only removes pagination. Explicit category/name or todo_id/todo_ids overrides the implicit default. Counts defaults to the whole window; scope=needs_you selects its matched_count. Cannot use scope=needs_you with category/name or ids, or any scope with taxonomy. (string, one of: needs_you, all) |
| `--view` | No | Default compact: summary and key times, no prompts/briefs/source metadata. taxonomy: current category configuration only, without a TODO read or counts. counts: totals and joint kind/category/status/stale_reason groups, no rows. full: all detail fields. Defaults: compact 20 per page; full 10 per page. (string, one of: taxonomy, counts, compact, full, default: `compact`) |
| `--category` | No | Filter by exact category id: needs_you, upcoming, worth_a_look, fyi, other, or a user-defined id from include_categories=true. Totals cover the whole window. (string) |
| `--category_name` | No | Filter by an exact, unique CURRENT taxonomy category name, including custom names. Resolves its ID before loading TODOs, without a separate counts/list request. Recognized category_label wins over the stored id; no UI presentation remapping. Add include_categories=true to confirm the mapping in the same response. Cannot combine with category. Unknown or ambiguous names fail. (string) |
| `--kind` | No | Filter by TODO kind: mail, calendar, spark or scheduled_skill. A category can mix these kinds. For email-only tasks use kind=mail; matched_count applies this filter. (string, one of: mail, calendar, spark, scheduled_skill) |
| `--status` | No | Filter by row status; active means still pending. Replied rows are stale with stale_reason=outbound_replied and require include_replied=true. matched_count applies this filter. (string, one of: active, completed, stale) |
| `--limit` | No | Rows per page (1-200), default 20 for compact and 10 for full. Cannot combine with all=true or view=counts. count is page size; total_count is the window total. (integer) |
| `--all` | No | Explicitly return ALL matching rows in the selected window. Default false. Use scope=all, view=full and all=true for the former unbounded full response. Can be large. Cannot combine with limit, cursor, todo_id/todo_ids or view=counts. (boolean) |
| `--cursor` | No | next_cursor from the previous page with the same window, category, kind and status. Restart if the list changes. (string) |
| `--todo_id` | No | Read one full TODO by id within the requested window and filters; result is todos[0]. Cannot combine with cursor. (string) |
| `--todo_ids` | No | Read up to 20 full TODOs in one call: comma-separated ids. Rows come back in the given order; ids absent from the window are listed in missing_todo_ids. Cannot combine with todo_id or cursor. (string) |
| `--hours` | No | Only return TODOs whose source item arrived within the last N hours (1-168). With neither hours nor since, the default arrival window is 168 hours. Use since for an older range. (integer) |
| `--since` | No | Only return TODOs whose source item arrived at or after this ISO-8601 instant. Combined with 'hours', the earlier floor wins. (string) |
| `--include_replied` | No | Also return items already handled by a reply (status 'stale', stale_reason 'outbound_replied'). Default false. (boolean) |
| `--include_categories` | No | Also return the current homepage taxonomy: category ids, names, descriptions and array priority order. Default false; use true when matching the homepage's current grouping. Row category_order is only a saved snapshot. (boolean) |

## See Also

- [gsk-shared](../gsk-shared/SKILL.md) — Authentication and global flags
