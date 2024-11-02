=== BSDev.at - Importer: Serendipity ===
Contributors: bsdev.at
Donate link: http://bsdev.at/
Tags: importer serendipity s9y
Requires at least: 3.0.0
Tested up to: 3.1.0
Stable tag: 

Importer for Serendipity Weblog Software, supporting PostgreSQL and MySQL via PDO.

== Description ==

NO VERSION RELEASED!! Don't know why WP Plugin Directory shows a version
even if i haven't released a TAG or BRANCH to SVN!!


[DE]
Das ist ein umfangreicher Importer um alle Daten aus einem Serendipity Weblog
nach WordPress zu übertragen. Da meist nicht alle Informationen übernommen werden
wenn man aus einem RSS Feed importiert, greift mein Script direkt (nur lesend)
auf die Daten der MySQL oder PostgreSQL Datenbank zu. Es ist auch möglich den Import
mehrmals laufen zu lassen. Es werden wahlweise nur neue Beiträge übernommen seit
dem letzten Start oder wenn gewünscht, bestehende ersetzt.

Das Serendipity Plugin "Tagging of entries" (serendipity_event_freetag) wird unterstützt
und die Tags werden mit importiert.

[EN]

This is the long description.  No limit, and you can use Markdown (as well as in the following sections).

For backwards compatibility, if this section is missing, the full length of the short description will be used, and
Markdown parsed.

A few notes about the sections above:

*   "Contributors" is a comma separated list of wp.org/wp-plugins.org usernames
*   "Tags" is a comma separated list of tags that apply to the plugin
*   "Requires at least" is the lowest version that the plugin will work on
*   "Tested up to" is the highest version that you've *successfully used to test the plugin*. Note that it might work on
higher versions... this is just the highest one you've verified.
*   Stable tag should indicate the Subversion "tag" of the latest stable version, or "trunk," if you use `/trunk/` for
stable.

    Note that the `readme.txt` of the stable tag is the one that is considered the defining one for the plugin, so
if the `/trunk/readme.txt` file says that the stable tag is `4.3`, then it is `/tags/4.3/readme.txt` that'll be used
for displaying information about the plugin.  In this situation, the only thing considered from the trunk `readme.txt`
is the stable tag pointer.  Thus, if you develop in trunk, you can update the trunk `readme.txt` to reflect changes in
your in-development version, without having that information incorrectly disclosed about the current stable version
that lacks those changes -- as long as the trunk's `readme.txt` points to the correct stable tag.

    If no stable tag is provided, it is assumed that trunk is stable, but you should specify "trunk" if that's where
you put the stable version, in order to eliminate any doubt.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= Do you plan to support S9Y SQLite as source? =

Maybe later, if the plugin is stable with MySQL and PostgreSQL.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Changelog ==

= 0.0.1 =
* initial release

== Upgrade Notice ==

= 0.0.1 =
Just install and run it! :)

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`