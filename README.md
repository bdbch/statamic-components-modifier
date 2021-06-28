# components-modifier

> A simple components loader & renderer for Statamic

# Installation

Install this plugin via running `composer require bdbch/statamic-components`. This will install the plugin into your Statamic project. After that,
make sure to enable the plugin in the Statamic Control Panel.

# Usage

## Step 1:
You will need to setup components for example as a fieldset to make it reusable for different types of content.

## Step 2:
Create a replicator field with whatever name you want. This is the replicator field from our example

```yaml
fields:
  -
    handle: page_components
    field:
      collapse: true
      sets:
        // your replicator sets will be added here
      display: Components
      type: replicator
      icon: replicator
      listable: hidden
```

## Step 3:
Create sets in your replicator containing fields. The set name will be used for the folder structure so keep this in mind. 

For this example I will create a component with a wysiwyg block & a image upload. This could be our yaml after this step:

```yaml
fields:
  -
    handle: page_components
    field:
      collapse: true
      sets:
        textblock_with_image:
          display: 'Textblock with Image'
          fields:
            -
              handle: content
              field:
                always_show_set_button: false
                buttons:
                  - h2
                  - h3
                  - bold
                  - italic
                  - unorderedlist
                  - orderedlist
                  - removeformat
                  - quote
                  - anchor
                  - image
                  - table
                save_html: false
                toolbar_mode: fixed
                link_noopener: false
                link_noreferrer: false
                target_blank: false
                reading_time: false
                fullscreen: true
                allow_source: true
                enable_input_rules: true
                enable_paste_rules: true
                display: Content
                type: bard
                icon: bard
                listable: hidden
                validate:
                  - required
            -
              handle: image
              field:
                mode: list
                container: assets
                restrict: false
                allow_uploads: true
                max_files: 1
                display: Image
                type: assets
                icon: assets
                listable: hidden
                validate:
                  - required
                  - image
      display: Components
      type: replicator
      icon: replicator
      listable: hidden
```

## Step 4:
Now we need to create the antlers template. **This currently only supports antlers, if you need a different rendering solution please create an issue or submit your pullrequest**.

To create a template, create a `components` folder in your `/resources/views` directory. Inside `/resources/views/components` you now have to create a folder called the same as your set name, for this example `textblock_with_image`. The final path would be `/resources/views/textblock_with_image`. Inside this directory, create an `index.antlers.html`. This template will now be loaded whenever this set type is used.

Inside this template, all fields from your set will be available to use.

## Step 5:
Now render your components at any place you want via using `{{ page_components | components }}`. This will render the replicator field `page_components` with the specified antlers template.

# Plans

* Rendering via Blade
* Allow nested component directories for nested components