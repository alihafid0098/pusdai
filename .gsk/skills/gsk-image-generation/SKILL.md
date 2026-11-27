---
name: gsk-image-generation
version: 1.0.0
description: Generate images using AI models. Supports text-to-image and image editing.
metadata:
  category: general
  generated_by: genspark_tool_cli/generate_skills.py
  requires:
    bins:
    - gsk
  cliHelp: gsk img --help
---

# gsk-image-generation

**PREREQUISITE:** Read `../gsk-shared/SKILL.md` for auth, global flags, and security rules.

Generate images using AI models. Supports text-to-image and image editing.

## Usage

```bash
gsk img [options]
```

**Aliases:** `img`

## Flags

| Flag | Required | Description |
|------|----------|-------------|
| `-m`, `--model` | No | If this parameter is omitted, nano-banana-2-flash-lite is used. Pick ONLY a model described below; never pick an undescribed model name unless the user explicitly asks for it by name. gpt-image-2: GPT Image 2 - Latest OpenAI image model. Superior text rendering, editing, and face preservation. Supports text-to-image and image editing with multi-image input. gpt-image-2.5: GPT Image 2.5 - OpenAI's newest image model and the default for high-fidelity generations. Edits change only what you ask, keeping subject and composition; natural lighting, rich textures. Text-to-image and editing with multi-image input, 1k-4k output. Pick a tier with `tier` (flare = fast default arm, sunburst = precision edits; same price). Quality rungs low/medium/high/xhigh/max (auto = high): xhigh and max bill extra credits on non-Pro plans, so only use them when the user explicitly asks for that quality. gpt-image-2.6: GPT Image 2.6 - OpenAI's newest image model (2026-11-04), same contract as 2.5 (edits change only what you ask; text-to-image and editing with multi-image input, 1k-4k) plus a planning-depth knob: `thinking_level` low/medium/high (default high, no extra fee; low = faster focused edits, high = dense text and complex layouts). Pick a tier with `tier` (flare = fast default arm, sunburst = detailed work and precision edits; same price). Quality rungs low/medium/high/xhigh/max (auto = high): low and medium cost 3-4x 2.5's rungs, so low is not a cheap draft; xhigh and max bill extra credits on non-Pro plans, so only use them when the user explicitly asks. fal-ai/bytedance/seedream/v5/lite: Bytedance Seedream v5 Lite model for text-to-image, image-to-image (single and multiple image editing) generation with native 2K resolution and excellent text layout.fal-ai/bytedance/seedream/v5/pro: Bytedance Seedream 5.0 Pro - flagship photorealistic model for text-to-image and multi-image editing (up to 10 reference images). High-density text/infographic layout, region-precise edits, native text in 14 languages, up to 2K output. xai/grok-imagine-image: xAI Grok Imagine Image 2.0 - top-ranked text-to-image and image editing (up to 3 reference images). Strong photorealism and prompt adherence, up to 2K output. qwen-image-3: Qwen Image 3 - Alibaba's latest image model for text-to-image and reference-image editing (1-3 reference images). Superior Chinese & English text rendering, precise prompt adherence, identity-preserving edits. Best for posters, bilingual typography, and instruction-based edits. fal-ai/flux-3: BFL FLUX 3 Image - newest Black Forest Labs model with native 2K/4K output, precise layout control and improved text rendering. Text-to-image and editing with up to 10 reference images. Ideal for posters, ads, infographics and layout-sensitive realistic images. fal-ai/z-image/turbo: Z-Image Turbo model optimized for speed without sacrificing quality. Supports both text-to-image and image-to-image modes. Perfect for quick iterations, bulk generation, style transfer, and cost-effective projects.bbox-segment: A model for extracting subjects from images based on bbox region.fal-bria-rmbg: A model specialized for remove background from image. Should prioritize this tool if the user wants to remove background from image. fal-ai/recraft-clarity-upscale: A model specialized for upscale image. fal-ai/image-editing/text-removal: A specialized model for removing text and watermarks from images. Automatically detects and removes text while preserving the background and other visual elements. Use when users want to clean images, remove watermarks, or eliminate text overlays. flux-pro/outpaint: A model specialized for expand image to a specific aspect ratio. nano-banana-2-flash-lite: [GEMINI NANO BANANA 2 FLASH LITE] Fast, lightweight Gemini image model for text-to-image and image editing with multi-image input. Native 1K output. Best for speed-sensitive, high-volume workflows. nano-banana-2.1: [GEMINI NANO BANANA 2.1] Google's newest Gemini image model: a quality step up from Nano Banana 2 for text-to-image and editing with up to 14 reference images, 1K/2K/4K output and a selectable thinking depth (thinking_level). Pick it when the user asks for it by name or wants the best Gemini result. bytedance/seedream-5.5: [BYTEDANCE SEEDREAM 5.5] Text-to-image and edits (up to 10 references), 1K/2K, dense text; natively outputs editable layers (output_layers / max_layers) and transparent PNGs (background). minimax/h3-image: [MINIMAX H3 IMAGE] Fast text-to-image and edits (up to 16 references), 1K/2K/4K at 1:3-3:1, long prompts and dense text.  (string, one of: gpt-image-2, gpt-image-2.5, gpt-image-2.6, fal-ai/bytedance/seedream/v5/lite, fal-ai/bytedance/seedream/v5/pro, xai/grok-imagine-image, qwen-image-3, fal-ai/flux-3, fal-ai/z-image/turbo, bbox-segment, fal-bria-rmbg, fal-ai/recraft-clarity-upscale, fal-ai/image-editing/text-removal, flux-pro/outpaint, nano-banana-2-flash-lite, nano-banana-2.1, bytedance/seedream-5.5, minimax/h3-image) |
| `--thinking_level` | No | nano-banana-2.1 and gpt-image-2.6 only (ignored by other models): how much the model thinks or plans before rendering. nano-banana-2.1 takes minimal/medium/high (default medium; minimal is fastest); gpt-image-2.6 takes low/medium/high (default high; low is faster for focused edits). Omit it for the default. Same price. (string, one of: minimal, low, medium, high) |
| `--tier` | No | gpt-image-2.5 and gpt-image-2.6 only (ignored by other models): which arm of the model runs. 'flare' (default when omitted) is the fast arm for most work; 'sunburst' trades speed for tighter control across repeated edits and detailed work. Same price. (string, one of: flare, sunburst) |
| `--output_layers` | No | Models whose info lists layers: return editable layers (base + one transparent PNG per element) instead of one flat image. Bills per layer. Only when the user asks for layers. Default false. (boolean) |
| `--max_layers` | No | Layered output only: cap on outputs (base + layers), 2-100; 30 is the default, not a limit. (integer) |
| `--background` | No | Models whose info lists it: 'transparent' (PNG with alpha), 'opaque' or 'auto' (default). Flat images only. A single transparent reference keeps its alpha unless this is set; pass 'auto' to let the model fill a requested background. (string, one of: auto, transparent, opaque) |
| `<query>` (positional) | No | Detailed description of the image to generate. The prompt should be in English.However, any specific text that should appear within the image does not need to be translated.(e.g., 'A futuristic cityscape with flying cars and neon lights at night'). Omit when passing the prompt by `query_file` instead. (string) |
| `--query_file` | No | Optional. Repo-relative path to a UTF-8 text file containing the prompt, used verbatim in place of `query` (lets you pass a long prompt by path instead of inlining it). Requires `repo_id`. When set, `query` may be omitted. (string) |
| `--bbox` | No | BBox of the target object, for bbox segmentation modelFormat: [x1, y1, x2, y2], x1 and y1 are the top-left corner coordinates, x2 and y2 are the bottom-right corner coordinates. (array) |
| `-i`, `--image_urls` | No | The URLs of the images to use as a reference for the image generation or editing. Default is []. REQUIRED whenever the task edits, restyles, or must stay visually consistent with an existing image, person, product, or brand — pass the source/reference URL(s) on EVERY such call, including retries: omitting them regenerates from text and silently discards the user's actual image. (array) |
| `--repo_id` | No | Optional. Second Brain repo id (provided in the agent's system prompt). Required only when image_urls contains relative paths from a Second Brain project (e.g. 'assets/foo.png'). Absolute http(s) URLs and data: URLs do not need this parameter. (string) |
| `-r`, `--aspect_ratio` | No | The aspect ratio of the image to generate. Default 'auto'. When editing with image_urls (image-to-image), use 'auto' so the output keeps the reference image's aspect ratio — never switch between portrait and landscape unless the user explicitly asks. (string, one of: 1:1, 4:3, 16:9, 9:16, 3:4, 2:3, 3:2, 4:5, 5:4, 21:9, auto) |
| `-s`, `--image_size` | No | Image size resolution. Default is auto. (string, one of: auto, 0.5k, 1k, 2k, 3k, 4k) |

## Local File Support

Parameters that accept URLs (`--image_urls`) also accept local file paths. The CLI automatically uploads local files before sending to the API.

## Output File

Use `-o <path>` / `--output-file <path>` to download the generated result directly to a local file.

## See Also

- [gsk-shared](../gsk-shared/SKILL.md) — Authentication and global flags
