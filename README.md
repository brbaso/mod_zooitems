# mod_zooitems
Joomla 3.x ZOO Items module - multiple choice

## General Information

This module is based on the original ZOO Component **mod_zooitem** module which is standard part of ZOO Component package - [ZOO Component!](http://yootheme.com/zoo/)

## Functionality 

To see how the original ZOO Component **mod_zooitem**  module functions please browse [ZOO Documentation!](http://yootheme.com/zoo/documentation/getting-started/set-up-zoo-item-module)

### multiple items
While the original ZOO Component **mod_zooitem** module allows to choose one Item per module (or multiple items but from a single category or item type) the **mod_zooitems** module allows to choose multiple items from multiple categories or types.

### themes and layouts
**mod_zooitems** uses three themes: *List*, *Uikit_grid* and *Uikit_grid_dynamic* with corresponding *Default*, *Uikit_grid* and *Uikit_grid_dynamic* lyouts.
 
 **List** theme renders **Default** layout and it is basic 'blog style' list of items.
 
 **Uikit_grid** and **Uikit_grid_dynamic** themes render **Uikit_grid** and **Uikit_grid_dynamic** layouts respectively and show items in a 'grid' style. These are dependent on [UIKit!](http://getuikit.com/index.html) front-end framework.
 
### installation 

Click on the Download ZIP button on this page (see image bellow) to download the module.

![Download ZIP](http://brbaso.com/images/mod_zooitems_doc/download-module-git-1.jpg)

 Install module as any other module using standard Joomla procedures.  - [Joomla Documentation -Installing an extension!](https://docs.joomla.org/Installing_an_extension)
 
 **Notice:** In order to install **mod_zooitems** module you **must** have ZOO Component installed and enabled first.
 
### module parameters
Here is screen-shot of **mod_zooitems** module parameters with some explanations:

![Module Parameters](http://brbaso.com/images/mod_zooitems_doc/module_parameters.jpg)
 
1.)

Themes:

 ![Theme Dropdown](http://brbaso.com/images/mod_zooitems_doc/theme_dropdown.jpg)

*List* -  a basic 'blog type' list of items

*Uikit_grid* - displays items in UIkit grid system

*Uikit_grid_dynamic* - displays items in a UIkit dynamic grid system with category filters enabled


2.)

Layout:

 ![Layout Dropdown](http://brbaso.com/images/mod_zooitems_doc/layout_dropdown.jpg)

*Default* - default layout, should be chosen together with the *List* theme from the Themes drop down.

*Uikit_grid* - UIkit grid layout, should be chosen together with the *Uikit_grid* theme from the Themes drop down.

*Uikit_grid_dynamic* - Uikit_grid_dynamic grid layout should be chosen together with the *Uikit_grid_dynamic* theme from the Themes drop down.


3.)

Grid Columns:

Number of grid columns to show items. It reflects to *Uikit_grid* and *Uikit_grid_dynamic* options above. Default 3.


4.)

Media Position:

 ![Media Dropdown](http://brbaso.com/images/mod_zooitems_doc/mediaposition_dropdown.jpg)

Different media positions choice. Additional *Cross - first left* and *Cross - first right* reflects on the *List theme* with *Default layout* by switching position of media from left to right and from right to left respectively, through the item list's rows.


5.)

Application:

Here you choose ZOO Application to show items. You need to have at least one Application defined in the ZOO Component   - [Install ZOO](http://yootheme.com/zoo/documentation/getting-started/install-zoo) 


6.)

Category / Type dropdown:

 ![Category - Type Dropdown](http://brbaso.com/images/mod_zooitems_doc/categorytypes_dropdown.jpg)

This is where you choose whether to get items to show by item Categories or by item Types.
 

7.) 

Choose Categories or Types:

Here you choose **multiple** Categories (or Types depending on choice in previous drop down) to show items.

8.) 

Choose Items:

Here you choose **multiple** items, from Categories(or Types) chosen above, to show.

9.)

Item Order

Here you can set Item ordering. This is order functionality from the original *mod_zooitem* module with some fixes applied. Also, the **Ignore Items Priority Settings** option has been added. When checked, Item ordering ignores ZOO Component's Item Priority Settings. Otherwise, the Item Priority Settings will remain preserved.
  
10.)


Module Class Suffix:

Here you can add module class suffix for additional styling of your module.

### Demo screen shots:

**UIKit dynamic grid with category filters**

 ![UIKit dynamic grid](http://brbaso.com/images/mod_zooitems_doc/demo-screenshots-grid_dynamic.jpg)
 
**UIKit grid - 4 columns**

 ![UIKit grid](http://brbaso.com/images/mod_zooitems_doc/demo-screenshots-grid-4columns.jpg)
 
 
**List theme default layout, media position 'Cross - first left'**

 ![List default](http://brbaso.com/images/mod_zooitems_doc/demo-screenshots-default-cross-first-left.jpg)
 




