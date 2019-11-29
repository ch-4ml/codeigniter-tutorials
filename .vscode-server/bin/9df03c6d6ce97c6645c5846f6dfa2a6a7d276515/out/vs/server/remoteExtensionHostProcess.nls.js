/*!--------------------------------------------------------
 * Copyright (C) Microsoft Corporation. All rights reserved.
 *--------------------------------------------------------*/
define("vs/server/remoteExtensionHostProcess.nls",{"vs/base/common/errorMessage":["{0}: {1}","An unknown error occurred. Please consult the log for more details.","A system error occurred ({0})","An unknown error occurred. Please consult the log for more details.","{0} ({1} errors in total)","An unknown error occurred. Please consult the log for more details."],"vs/base/common/severity":["Error","Warning","Info"],"vs/base/node/processes":["Can't execute a shell command on a UNC drive."],
"vs/editor/common/config/editorOptions":["The editor will use platform APIs to detect when a Screen Reader is attached.","The editor will be permanently optimized for usage with a Screen Reader.","The editor will never be optimized for usage with a Screen Reader.","Controls whether the editor should run in a mode where it is optimized for screen readers.","Controls whether copying without a selection copies the current line.","Controls whether the search string in the Find Widget is seeded from the editor selection.","Controls whether the find operation is carried out on selected text or the entire file in the editor.","Controls whether the Find Widget should read or modify the shared find clipboard on macOS.","Controls whether the Find Widget should add extra lines on top of the editor. When true, you can scroll beyond the first line when the Find Widget is visible.","Controls the font size in pixels.","Controls the behavior of 'Go To' commands, like Go To Definition, when multiple target locations exist.","Show peek view of the results (default)","Go to the primary result and show a peek view","Go to the primary result and enable peek-less navigation to others","Controls whether the hover is shown.","Controls the delay in milliseconds after which the hover is shown.","Controls whether the hover should remain visible when mouse is moved over it.","Enables the code action lightbulb in the editor.","Controls the line height. Use 0 to compute the line height from the font size.","Controls whether the minimap is shown.","Controls the side where to render the minimap.","Controls whether the minimap slider is automatically hidden.","Render the actual characters on a line as opposed to color blocks.","Limit the width of the minimap to render at most a certain number of columns.","Enables a pop-up that shows parameter documentation and type information as you type.","Controls whether the parameter hints menu cycles or closes when reaching the end of the list.","Enable quick suggestions inside strings.","Enable quick suggestions inside comments.","Enable quick suggestions outside of strings and comments.","Controls whether suggestions should automatically show up while typing.","Line numbers are not rendered.","Line numbers are rendered as absolute number.","Line numbers are rendered as distance in lines to cursor position.","Line numbers are rendered every 10 lines.","Controls the display of line numbers.","Render vertical rulers after a certain number of monospace characters. Use multiple values for multiple rulers. No rulers are drawn if array is empty.","Controls whether filtering and sorting suggestions accounts for small typos.","Controls whether sorting favours words that appear close to the cursor.","Controls whether remembered suggestion selections are shared between multiple workspaces and windows (needs `#editor.suggestSelection#`).","Control whether an active snippet prevents quick suggestions.","Controls whether to show or hide icons in suggestions.","Controls how many suggestions IntelliSense will show before showing a scrollbar (maximum 15).","Controls whether some suggestion types should be filtered from IntelliSense. A list of suggestion types can be found here: https://code.visualstudio.com/docs/editor/intellisense#_types-of-completions.","When set to `false` IntelliSense never shows `method` suggestions.","When set to `false` IntelliSense never shows `function` suggestions.","When set to `false` IntelliSense never shows `constructor` suggestions.","When set to `false` IntelliSense never shows `field` suggestions.","When set to `false` IntelliSense never shows `variable` suggestions.","When set to `false` IntelliSense never shows `class` suggestions.","When set to `false` IntelliSense never shows `struct` suggestions.","When set to `false` IntelliSense never shows `interface` suggestions.","When set to `false` IntelliSense never shows `module` suggestions.","When set to `false` IntelliSense never shows `property` suggestions.","When set to `false` IntelliSense never shows `event` suggestions.","When set to `false` IntelliSense never shows `operator` suggestions.","When set to `false` IntelliSense never shows `unit` suggestions.","When set to `false` IntelliSense never shows `value` suggestions.","When set to `false` IntelliSense never shows `constant` suggestions.","When set to `false` IntelliSense never shows `enum` suggestions.","When set to `false` IntelliSense never shows `enumMember` suggestions.","When set to `false` IntelliSense never shows `keyword` suggestions.","When set to `false` IntelliSense never shows `text` suggestions.","When set to `false` IntelliSense never shows `color` suggestions.","When set to `false` IntelliSense never shows `file` suggestions.","When set to `false` IntelliSense never shows `reference` suggestions.","When set to `false` IntelliSense never shows `customcolor` suggestions.","When set to `false` IntelliSense never shows `folder` suggestions.","When set to `false` IntelliSense never shows `typeParameter` suggestions.","When set to `false` IntelliSense never shows `snippet` suggestions.","Controls whether suggestions should be accepted on commit characters. For example, in JavaScript, the semi-colon (`;`) can be a commit character that accepts a suggestion and types that character.","Only accept a suggestion with `Enter` when it makes a textual change.","Controls whether suggestions should be accepted on `Enter`, in addition to `Tab`. Helps to avoid ambiguity between inserting new lines or accepting suggestions.","Editor content","Use language configurations to determine when to autoclose brackets.","Autoclose brackets only when the cursor is to the left of whitespace.","Controls whether the editor should automatically close brackets after the user adds an opening bracket.","Type over closing quotes or brackets only if they were automatically inserted.","Controls whether the editor should type over closing quotes or brackets.","Use language configurations to determine when to autoclose quotes.","Autoclose quotes only when the cursor is to the left of whitespace.","Controls whether the editor should automatically close quotes after the user adds an opening quote.","Controls whether the editor should automatically adjust the indentation when users type, paste or move lines. Extensions with indentation rules of the language must be available.","Use language configurations to determine when to automatically surround selections.","Surround with quotes but not brackets.","Surround with brackets but not quotes.","Controls whether the editor should automatically surround selections.","Controls whether the editor shows CodeLens.","Controls whether the editor should render the inline color decorators and color picker.","Controls whether syntax highlighting should be copied into the clipboard.","Control the cursor animation style.","Controls whether the smooth caret animation should be enabled.","Controls the cursor style.","Controls the minimal number of visible leading and trailing lines surrounding the cursor. Known as 'scrollOff' or `scrollOffset` in some other editors.","Controls the width of the cursor when `#editor.cursorStyle#` is set to `line`.","Controls whether the editor should allow moving selections via drag and drop.","Scrolling speed multiplier when pressing `Alt`.","Controls whether the editor has code folding enabled.","Controls the strategy for computing folding ranges. `auto` uses a language specific folding strategy, if available. `indentation` uses the indentation based folding strategy.","Controls the font family.","Enables/Disables font ligatures.","Controls the font weight.","Controls whether the editor should automatically format the pasted content. A formatter must be available and the formatter should be able to format a range in a document.","Controls whether the editor should automatically format the line after typing.","Controls whether the editor should render the vertical glyph margin. Glyph margin is mostly used for debugging.","Controls whether the cursor should be hidden in the overview ruler.","Controls whether the editor should highlight the active indent guide.","Controls the letter spacing in pixels.","Controls whether the editor should detect links and make them clickable.","Highlight matching brackets when one of them is selected.","A multiplier to be used on the `deltaX` and `deltaY` of mouse wheel scroll events.","Zoom the font of the editor when using mouse wheel and holding `Ctrl`.","Merge multiple cursors when they are overlapping.","Maps to `Control` on Windows and Linux and to `Command` on macOS.","Maps to `Alt` on Windows and Linux and to `Option` on macOS.","The modifier to be used to add multiple cursors with the mouse. The Go To Definition and Open Link mouse gestures will adapt such that they do not conflict with the multicursor modifier. [Read more](https://code.visualstudio.com/docs/editor/codebasics#_multicursor-modifier).","Each cursor pastes a single line of the text.","Each cursor pastes the full text.","Controls pasting when the line count of the pasted text matches the cursor count.","Controls whether the editor should highlight semantic symbol occurrences.","Controls whether a border should be drawn around the overview ruler.","Controls the number of decorations that can show up at the same position in the overview ruler.","Controls the delay in milliseconds after which quick suggestions will show up.","Controls whether the editor should render control characters.","Controls whether the editor should render indent guides.","Render last line number when the file ends with a newline.","Highlights both the gutter and the current line.","Controls how the editor should render the current line highlight.","Render whitespace characters except for single spaces between words.","Render whitespace characters only on selected text.","Controls how the editor should render whitespace characters.","Controls whether selections should have rounded corners.","Controls the number of extra characters beyond which the editor will scroll horizontally.","Controls whether the editor will scroll beyond the last line.","Controls whether the Linux primary clipboard should be supported.","Controls whether the editor should highlight matches similar to the selection.","Controls whether the fold controls on the gutter are automatically hidden.","Controls fading out of unused code.","Show snippet suggestions on top of other suggestions.","Show snippet suggestions below other suggestions.","Show snippets suggestions with other suggestions.","Do not show snippet suggestions.","Controls whether snippets are shown with other suggestions and how they are sorted.","Controls whether the editor will scroll using an animation.","Font size for the suggest widget. When set to `0`, the value of `#editor.fontSize#` is used.","Line height for the suggest widget. When set to `0`, the value of `#editor.lineHeight#` is used.","Controls whether suggestions should automatically show up when typing trigger characters.","Always select the first suggestion.","Select recent suggestions unless further typing selects one, e.g. `console.| -> console.log` because `log` has been completed recently.","Select suggestions based on previous prefixes that have completed those suggestions, e.g. `co -> console` and `con -> const`.","Controls how suggestions are pre-selected when showing the suggest list.","Tab complete will insert the best matching suggestion when pressing tab.","Disable tab completions.","Tab complete snippets when their prefix match. Works best when 'quickSuggestions' aren't enabled.","Enables tab completions.","Inserting and deleting whitespace follows tab stops.","Characters that will be used as word separators when doing word related navigations or operations.","Lines will never wrap.","Lines will wrap at the viewport width.","Lines will wrap at `#editor.wordWrapColumn#`.","Lines will wrap at the minimum of viewport and `#editor.wordWrapColumn#`.","Controls how lines should wrap.","Controls the wrapping column of the editor when `#editor.wordWrap#` is `wordWrapColumn` or `bounded`.","No indentation. Wrapped lines begin at column 1.","Wrapped lines get the same indentation as the parent.","Wrapped lines get +1 indentation toward the parent.","Wrapped lines get +2 indentation toward the parent.","Controls the indentation of wrapped lines."],
"vs/platform/configuration/common/configurationRegistry":["Default Configuration Overrides","Configure editor settings to be overridden for {0} language.","Configure editor settings to be overridden for a language.","Cannot register '{0}'. This matches property pattern '\\\\[.*\\\\]$' for describing language specific editor settings. Use 'configurationDefaults' contribution.","Cannot register '{0}'. This property is already registered."],"vs/platform/extensionManagement/common/extensionManagement":["Extensions","Preferences"],"vs/platform/markers/common/markers":["Error","Warning","Info"],"vs/platform/workspaces/common/workspaces":["Code Workspace"],"vs/workbench/api/common/extHost.api.impl":["{0} (Extension)"],"vs/workbench/api/common/extHostDiagnostics":["Not showing {0} further errors and warnings."],"vs/workbench/api/common/extHostExtensionActivator":["Cannot activate extension '{0}' because it depends on extension '{1}', which failed to activate.","Activating extension '{0}' failed: {1}."],
"vs/workbench/api/common/extHostExtensionService":["Path {0} does not point to a valid extension test runner."],"vs/workbench/api/common/extHostProgress":["{0} (Extension)"],"vs/workbench/api/common/extHostStatusBar":["Extension Status"],"vs/workbench/api/common/extHostTreeViews":["No tree view with id '{0}' registered.","No tree view with id '{0}' registered.","No tree view with id '{0}' registered.","No tree view with id '{0}' registered.","Element with id {0} is already registered"],"vs/workbench/api/common/extHostWorkspace":["Extension '{0}' failed to update workspace folders: {1}"],"vs/workbench/api/node/extHostDebugService":["debuggee"],"vs/workbench/api/node/extHostLogService":["Remote Extension Host","Extension Host"],"vs/workbench/common/views":["A view with id '{0}' is already registered in the container '{1}'"],
"vs/workbench/contrib/debug/node/debugAdapter":["Debug adapter executable '{0}' does not exist.","Cannot determine executable for debug adapter '{0}'.","Unable to launch debug adapter from '{0}'.","Unable to launch debug adapter."],"vs/workbench/contrib/externalTerminal/node/externalTerminalService":["VS Code Console","Script '{0}' failed with exit code {1}","'{0}' not supported","Press any key to continue...","'{0}' failed with exit code {1}","can't find terminal application '{0}'","External Terminal","Use VS Code's integrated terminal.","Use the configured external terminal.","Customizes what kind of terminal to launch.","Customizes which terminal to run on Windows.","Customizes which terminal application to run on macOS.","Customizes which terminal to run on Linux."],"vs/workbench/contrib/terminal/common/terminal":["Terminal"],
"vs/workbench/services/configurationResolver/common/variableResolver":["'{0}' can not be resolved. Please open an editor.","'{0}' can not be resolved. No such folder '{1}'.","'{0}' can not be resolved in a multi folder workspace. Scope this variable using ':' and a workspace folder name.","'{0}' can not be resolved. Please open a folder.","'{0}' can not be resolved because no environment variable name is given.","'{0}' can not be resolved because setting '{1}' not found.","'{0}' can not be resolved because '{1}' is a structured value.","'{0}' can not be resolved because no settings name is given.","'{0}' can not be resolved. Make sure to have a line selected in the active editor.","'{0}' can not be resolved. Make sure to have some text selected in the active editor.","'{0}' can not be resolved because the command has no value."]});
//# sourceMappingURL=https://ticino.blob.core.windows.net/sourcemaps/9df03c6d6ce97c6645c5846f6dfa2a6a7d276515/core/vs/server/remoteExtensionHostProcess.nls.js.map
