# Monitor: Quote

This [Joomla!](https://www.joomla.org) content plugin adds functionality to insert quotes in comments in the [Monitor](https://github.com/Harmageddon/com_monitor) component.

## Requirements

* Joomla! 3.x
* [Monitor](https://github.com/Harmageddon/com_monitor) installed and configured

## Installation

* [Download](https://github.com/Harmageddon/plg_monitor_quote/releases) the latest release.
* Install it on your web site.
* Enable the plugin.

## Features

* Syntax: `{quote=*userId*,*issueId*.*commentId*}Text{/quote}`
* Next to every comment, a button is added to quote the comment text. JavaScript needs to be enabled for the button to work.

### Example

```
{quote=400,3.2*}Everything is broken!{/quote}
Have you tried turning it off and on again?
```

### Result

> Everything is broken!
>
> Written by SomeUser

Have you tried turning it off and on again?
