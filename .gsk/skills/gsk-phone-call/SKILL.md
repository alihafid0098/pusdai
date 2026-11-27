---
name: gsk-phone-call
version: 1.0.0
description: Make a real AI phone call on the user's behalf. Use when a task needs
  a phone conversation with a business or person (book, ask, confirm, negotiate);
  for a text message use the sibling `gsk telephony sms send`. Returns the call's
  status, summary and transcript. Not for emergency or premium-rate numbers, sensitive
  institutions, or sales, marketing and political calls.
metadata:
  category: phone-call
  generated_by: genspark_tool_cli/generate_skills.py
  requires:
    bins:
    - gsk
  cliHelp: gsk telephony call dial --help
---

# gsk-phone-call

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

Make a real AI phone call on the user's behalf. Use when a task needs a phone conversation with a business or person (book, ask, confirm, negotiate); for a text message use the sibling `gsk telephony sms send`. Returns the call's status, summary and transcript. Not for emergency or premium-rate numbers, sensitive institutions, or sales, marketing and political calls.

## Usage

```bash
gsk telephony call dial [options]
```

## SMS sibling: `gsk telephony sms send`

Send a real SMS on the user's behalf. The message body is sent VERBATIM — pass exactly the text the user approved, never compose or embellish it. Validates prerequisites (membership, phone setup, credits), destination number lineage, and the per-country segment budget (South Korea: single segment only, 70 chars for Korean text; Japan: max 5 segments), then sends and returns the delivery handle (sid), segments, and credits charged. Over-budget messages are rejected, never truncated.
Destination numbers must have verifiable lineage (user-provided, prior tool results, or a calllog: contact_ref) — never fabricate a number. The number must be E.164 ('+' + country calling code + national number); a number without its country calling code is refused (code invalid_phone_number).
Use dry_run=true first when unsure: it validates and prices (encoding, segment count, credits) without sending.
Read the outcome from the envelope's session_state, as for phone_call — the envelope status is ok even when nothing was sent: a refusal sets session_state.sms_precheck to login_required, membership_required, setup_incomplete or insufficient_credits (the message text carries the setup or pricing URL); a dry run or a send sets session_state.sms_result (to, country, encoding, segments, max_segments, estimated_credits; a dry run adds assembled_message, a send adds sms_id, status, credits_charged). Branch on these fields, never on the message text.
MANDATORY after every send: report to the user the recipient, delivery status, segment count, and credits charged.

```bash
gsk telephony sms send [options]   # see `gsk telephony sms send --help`
```

## Getting the recording file

`gsk telephony call detail <project_id>` returns the call record and a recording link. To hand the audio file itself to the user or a channel, download it:

    gsk telephony call recording <project_id> ./call.wav

Default is dual-channel (L=callee, R=caller). Add `--channels mono` for a single server-mixed track. `--info` reports duration and size without downloading.
If the answer is `recording_not_ready`, the call has not finished finalising — poll `gsk telephony call status` and retry.

## The flow — a phone task from ask to delivered result

`dial` is one step of a flow, not the whole job. Run the flow below for every
phone task; the sections above hold the command details.

1. **Settle everything up front, once.** Before the first dial, confirm with
   the user in a single exchange: the goal, the hard constraints, what the call
   may agree to and what it must decline (payment, deposit, contract, private
   data), how many calls are allowed, and the language the callee speaks.
   A call the user asked for is dialed once that exchange is settled — no
   second "may I call?". A call the user did NOT ask for (you picked the
   phone yourself because another route was blocked) rings a real phone and
   cannot be taken back: ask first, as an approval (`de message-send
   --await-reply --approval` in GenTeam; name who you will call and, when you
   know it, what time it is there), and dial only on their yes — never dial
   first and announce it afterwards; no yes, no call.
   Asked for means the user named the call ("call them", "phone the shop").
   "Find another way", "just get it done" or "up to you" is not a call
   request: when the phone is the route you chose, that call still needs the
   approval above.
   Everything after this runs without coming back to ask. There is no live
   channel during a call: the voice agent works from `purpose` alone.
   Calling hour — a reminder, not a rule: a late-night call is usually
   unwelcome, so prefer the callee's daytime, but an urgent call goes ahead
   at any hour. A phone number does not tell you the callee's time zone
   (people travel with their phones); use your judgment.
2. **Check readiness.** Run `gsk telephony setup-status` whenever the ask is
   about calling. Not ready → hand the user the returned `setup_url` and stop;
   never dial around a gate. The number and the recipient name come from the user, prior tool results
   or research (a maps search lists the phone number) — never
   invented. **The number must be E.164**: `+` + country calling code +
   national number (`+<country calling code><national number>`). Every
   number must carry its country calling code; one without it is refused
   with `code=invalid_phone_number` and the country is never guessed for
   you. The refusal lists the clues the server has (where the request came
   from — for you in a sandbox that is the sandbox, not the user — and the
   country of the user's own verified number); use them to ASK the user
   which country the number belongs to, then retry with the full `+` form.
3. **Write a self-sufficient `purpose`.** One string carrying the goal, every
   fact the callee may need, every question that must be answered, what to
   accept and what to decline, and the call language. Nothing can be added
   mid-call; a thin `purpose` is the top cause of a failed call. Use
   `--dry-run` first when the contact is unverified: a dry run validates
   only and never places a call.

   Every real dial passes a purpose review before anything is dialed
   (`--dry-run` currently stops before it). The review refuses: emergency
   and premium-rate numbers; political purposes; sensitive institutions
   (police non-emergency lines, embassies and consulates, airports,
   military, government security); marketing, sales or any commercial
   solicitation; harassment, scams, threats or other malicious intent;
   call-pumping patterns (silent presence, "never hang up", padding the
   duration); any instruction to deny being an AI, impersonate a real
   person or hide who the call is for; and a purpose the callee cannot act
   on (a reservation without date, time and party size; a scheduling call
   without the caller's availability). Separately, some countries and
   number prefixes are refused as outbound destinations, and a number
   called too often in the last 24 hours is refused. Never write a purpose
   that argues around any of this.
4. **Dial once, asynchronously, then poll.**
   `gsk telephony call dial <recipient> -n <phone number> -p <purpose> --async`
   (or `-r <calllog: contact_ref | self>` to re-dial by reference)
   returns at once with `project_id`. The dispatch reply carries no dial
   state: its `call_status` is `preparing` — the purpose review has not run
   and nothing has been dialed; only the status poll tells you whether the
   call was placed. Poll `gsk telephony call status
   <project_id>` until the status is terminal. A call can run several minutes
   through IVR and hold; a long call still in progress is not a stuck call. If
   a blocking dial timed out, the call is still live: take the project id from
   the `Dialing... (project: ...)` line and poll its status. **Never dial the
   same number again while a call is not terminal.**

   When a dial does not end in a conversation, read `call_status` together
   with `dial_attempts` (present only when a dial was actually placed) and
   the reason text in `call_summary`, then pick the class below. The
   envelope's top-level `status` is `ok` whenever the dial flow ran to its
   end — a refused, busy, unanswered or failed call included; `error` means
   the request itself did not run (invalid input, a check before the flow,
   a server error). Judge the call by `call_status` and
   `dial_rejection_reason`, never by `status`. Phone
   manners apply throughout: a line that was engaged, unanswered or refused
   is not chased, and the system accepts at most 4 dials to one number per
   user per day (6 across all users) — plan every retry inside that.

   - `blocked` or `dial_rejection_reason: purpose_rejected` — the purpose
     review refused it; nothing was dialed.
     - It asks for a fact you already hold from step 1 (date, time, party
       size, your availability, who is calling): add it to `purpose` and
       dial once more, no question to the user.
     - "Failed to analyze the purpose of the call": the review did not
       run; dial once more.
     - It names information you do not have: ask the user for exactly
       that, then dial.
     - It names a policy category (political, marketing, malicious, call
       pumping, hiding the AI or the principal): tell the user which one
       and quote the reason; dial again only if the user changes the goal
       itself — rewording the same intent is refused again.
     - The purpose does not fit the callee: confirm the target with the
       user.
   - `failed` with no `dial_attempts` — a check refused it before any dial.
     The dial result says so up front: `message` opens with "Call refused
     before dialing", `call_status` is `failed` and `dial_rejection_reason`
     names the check (`frequency_limit`, `setup_incomplete`,
     `membership_required`, `insufficient_credits`, `caller_id_rejected`);
     the status poll carries the same reason. Act on the reason:
     - `frequency_limit` ("called too frequently"): retry later. The limit
       is per 24 hours and the message carries no timer; tell the user this
       callee cannot be reached before tomorrow.
     - Destination refused (country or region not supported, number
       blocked): do not retry — final for that party. Never try another
       number for the same callee to get around it.
     - `caller_id_rejected` whose message says the selected caller ID could
       not be used for this call (it is the number being called, or no
       longer registered): no setup step — dial once more with another
       caller ID or `--from_number system`; the number itself is fine.
     - `setup_incomplete`, `caller_id_rejected` (any other message),
       `membership_required`, `insufficient_credits`: hand the user the
       `setup_url` or the message, wait, and run `setup-status` again
       before dialing.
     - Any other reason ("unexpected error", "temporarily unavailable"):
       one retry a few minutes later; if it fails again, stop and report.
   - `busy` — the line was engaged. Do not redial on your own; report it.
     If the user wants another try, wait at least 30 minutes.
   - `no-answer` — it rang out. At most one more try within the count
     agreed in step 1, at least 30 minutes later and, per the calling-hour
     reminder in step 1, preferably in the callee's daytime; a second
     no-answer ends the task for that party — report.
   - `busy`, `no-answer` or `failed` whose `error_message` (also appended to
     `call_summary`) says the call was dialed from the user's verified caller
     ID and the destination country's carriers may have blocked it: the
     system did not redial — that choice is yours. Exactly one retry, now,
     with `--from_number system`; if that one does not get through either,
     the number is final for that party — no further dial, report both
     attempts. Without that note the plain `busy` / `no-answer` rules above
     apply.
   - `canceled` — stopped from our side (a hang-up or a timeout before
     pickup). Do not redial unless the user asks.
   - `failed` with `dial_attempts` — the carrier could not complete the
     call. Read `sip_response_code`, `error_code`, `error_message` and
     `dial_rejection_reason` from the dial result or status when present.
     The system never redials on its own (a carrier's code does not say
     whether a retry would help), so `dial_attempts` is 1 and any retry is
     your decision under these rules. When `error_message` carries the
     verified-caller-ID note, that note wins for every code below — the one
     `--from_number system` retry of the bullet above, then final. Without
     the note: SIP 404, 410 or 484: ask the user to verify the number, never
     redial the unchanged number. SIP 403 or a destination rejection: stop;
     do not change numbers to bypass it. SIP 603: treat it as a refusal, no
     redial that day. For other or missing codes, report the available
     reason without guessing; retry only after the user confirms, at least
     10 minutes later. Older servers may omit these fields; do not infer a
     cause from their absence.
   - `completed` — judge from the transcript (step 6). Voicemail or an
     unattended IVR counts as not reached: at most one more try, not
     within the same hour, and never a second voicemail on the same day.

   Whatever the class: never split a refused goal into several smaller
   calls, and never change the contact to make a refused purpose pass.
5. **Fetch the record of each call.** On terminal status,
   `gsk telephony call detail <project_id>` returns the summary and the full
   transcript; `gsk telephony call recording <project_id> ./call.wav` saves
   the audio file (see "Getting the recording file" above). Redirect stdout
   to a file and parse the file: long transcripts truncate in context.
   The persisted record can lag `status` by a few seconds after it turns
   terminal: a `detail` with `"recording_pending": true` has no recording
   links yet, so retry it for the recording. A call that did not connect
   has no recording at all; its `detail` carries the same diagnostics as
   `status` (`sip_response_code`, `error_code`, `error_message`,
   `dial_rejection_reason`, `dial_attempts`).
6. **Judge every `completed` call from the transcript, not from the
   status.** `completed` includes voicemail, refusals and "we will call you
   back". Goal met → the task ends; do not dial again to "confirm".
   Terminal (declined, closed, will not talk to an AI, goal impossible) →
   stop, do not redial. Decision needed (payment, identity, legal) → the
   call declined as told by `purpose`; raise it to the user now, between
   calls. Not reached (voicemail, IVR loop, an endless hold) → the retry
   table in step 4 applies. Any status other than `completed` is handled by
   that table too.
7. **Deliver per call.** Report how many calls were made and, for each: whom
   you called, when, status, real duration, every dial attempt
   (`dial_attempts`), what was agreed (quoted from the transcript), the
   transcript inline when it is short or else where it is
   (`gsk telephony call detail <project_id>`; `gsk telephony call log` lists
   past calls), and the recording file. Report in the user's language; the
   call itself runs in the callee's.

Keep one line per call in a durable place as you go (`project_id`, status,
goal met, one-line summary) and build the report from it. Several candidates:
call them one at a time and stop at the first acceptable result; for a
"compare all" goal, reach every candidate with the same `purpose` first.

## Flags

| Flag | Required | Description |
|------|----------|-------------|
| `<recipient>` (positional) | Yes | The name of the person or business to call, e.g. 'John Smith', 'Dr. Sarah Johnson', 'Starbucks George Street'. (string) |
| `-n`, `--phone_number` | No | The phone number to call, in E.164: '+' followed by the country calling code and the national number ('+<country calling code><national number>'). Every number must carry its country calling code; a number without it is refused (code invalid_phone_number) and the refusal lists country clues (the request's origin, the user's own verified number) — ask the user for the country rather than guessing. MUST have verified data lineage from (1) user-provided info, (2) previous tool results, or (3) explicit context — NEVER fabricate, estimate, or infer a number. Finding the number is your job, not the CLI's: look it up first (e.g. `gsk maps-search`, a web search) and pass the phone number the result lists, with its country code. Exactly one of phone_number / contact_ref. (string) |
| `-r`, `--contact_ref` | No | A reference the server resolves to a number: a calllog: contact_ref from the call log's contacts view (`gsk telephony call log --view contacts`) — the preferred way to re-dial someone previously called, their real number stays masked — or self, your own verified number. Exactly one of phone_number / contact_ref. (string) |
| `-p`, `--purpose` | Yes | The clear reason for making the call (e.g., 'Check reservation availability', 'Inquire about business hours'). (string) |

> **CAUTION:** This command performs a write/send operation. Double-check parameters before executing.

## See Also

- [gsk-shared](../gsk-shared/SKILL.md) — Authentication and global flags
