---
name: gsk-connector
description: Discover and invoke ANY user connector (Gmail, Slack, Notion, HubSpot, custom MCP servers, ...) through one unified flow. Read advertised guides and call documented tools directly, using tool discovery when details are missing.
---

# Connectors — unified discovery & invocation

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

> **Availability:** `gsk connector list` and `gsk connector search` are
> available regardless of the unified invocation rollout. The `guide`,
> `tools`, and `call` commands may not be enabled for every account yet.
> If one returns an unknown-command / not-found error, use the discovered
> binding with `gsk mcp tools` / `gsk mcp call` or the per-service commands
> documented in the sibling `gsk-<service>` skills. Discovery still lists
> available connection options when neither variant is connected.

One flow covers every connector, present and future:

```bash
gsk connector list                      # what is already connected?
gsk connector search <keyword>          # does a connector for X exist?
gsk connector guide <identifier>        # read once when discovery advertises a guide
gsk connector call <identifier> -t <tool> -a '<json>'   # call a documented tool directly
gsk connector tools <identifier>        # fallback when guide/tool/argument details are missing
```

- `<identifier>`: connector id (`gmail`, `slack`, `hubspot`), display name
  (`"Google Drive"`), or MCP slug (`figma_design`) — all returned by
  list or search. Use installed connector IDs when a guide instructs you to.
- `-a` takes the tool's argument object as a **JSON string**; `'{}'` for none.
- Responses can embed a `next`/`call` field with an exact follow-up command;
  use it when that discovery or invocation step is needed.
- Discovery rows include `guide` only when a maintained guide exists. Read
  that command before first using the connector, then reuse the guide in
  this session; if none is advertised, continue with tool discovery. Call
  documented tools directly when the guide covers the required tool and
  arguments. Guide examples and returned schemas supply exact names without
  guessing. Use `tools` only when no guide is advertised, `guide.status` is
  `not_available`, needed tool or argument details are missing, or a call
  reports an unknown tool or schema mismatch. Respect connection and
  enablement hints and tool-specific safety requirements. Native and MCP
  variants have separate guides.

## Choosing API or MCP

When the user names a service such as Notion or Box, run `list` and search
by the service name to discover both its native/API and MCP connectors.
The user does not need to say "MCP". An unconnected native/API binding
does not mean the service's MCP binding is unconnected.

Use an already connected, permitted variant that supports the task
immediately; do not ask the user to connect the other variant or choose a
protocol. If both are connected, choose by capability while honoring an
explicit user choice. Use the exact connector ID returned by discovery;
native and MCP IDs identify separate bindings. Never silently substitute
another binding for an explicit connector ID. Read the selected variant's
advertised guide before first use, following the flow above. Preserve the
user's requested account, workspace, and resource when choosing a variant.

If neither variant is connected and both are available to this account,
explain that API and MCP connectors are available and ask for either one
to be connected. A row or error that carries `instruction_for_agent` says
who can connect it and how: follow it as written; only without one, point
the user to the Connectors page. Use an ordinary question for
this choice; do not put API and MCP alternatives into the native-only
`connector_setup` card or require both connections. Resume once either
connects. Respect organization restrictions and connectors turned OFF for
the task; do not bypass a block by switching variants or offer hidden or
blocked variants.

## Error codes (final NDJSON line, `status: "error"`)

| error_code | Meaning / what to do |
|---|---|
| `not_connected` | Repeat service-wide API/MCP discovery before recommending setup. Use a connected, permitted variant if it can access the requested account and resource. If neither is connected, offer the available connection options as in Choosing API or MCP; when both exist, connecting either one is sufficient. Do not retry the disconnected binding until it is connected. |
| `account_not_connected` | Restore the requested account's connection. Do not substitute another account or workspace. |
| `connector_blocked_by_org_policy` | The org admin disabled this connector. Tell the user; do not retry. |
| `unknown_connector` | Use the `suggestions` field to correct the identifier. |
| `unknown_tool` | Inspect `tools` for the current schema and correct the call. |
| `scope_denied` | This API token cannot use that tool. |
| `rate_limited` | Back off; honor `retry_after`. |

## Example

When discovery does not advertise a guide, inspect tools before calling:

```bash
gsk connector search crm
gsk connector tools hubspot
gsk connector call hubspot -t create_contact -a '{"email": "a@b.com", "firstname": "Ada"}'
```

Old per-connector commands (`gsk gmail ...`, `gsk mcp call ...`) still work
but are deprecated — prefer this flow.
