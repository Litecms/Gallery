<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for gallery in gallery package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  gallery module in gallery package
    | and it is used by the template/view files in this module
    |
     */

    /**
     * Singlular and plural name of the module
     */
    'name'        => 'Gallery',
    'names'       => 'Galleries',

    /**
     * Singlular and plural name of the module
     */
    'title'       => [
        'main'   => 'Galleries',
        'sub'    => 'Our awsome photo gallery.',
        'list'   => 'List of galleries',
        'edit'   => 'Edit gallery',
        'create' => 'Create new gallery',
    ],

    /**
     * Options for select/radio/check.
     */
    'options'     => [
        'published' => ['Yes' => 'Yes', 'No' => 'No'],
        'status'    => ['show' => 'show', 'hide' => 'hide'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder' => [
        'id'            => 'Please enter id',
        'title'         => 'Please enter title',
        'details'       => 'Please enter details',
        'images'        => 'Please enter images',
        'slug'          => 'Please enter slug',
        'status'        => 'Please select status',
        'user_id'       => 'Please enter user',
        'user_type'     => 'Please enter user type',
        'upload_folder' => 'Please enter upload folder',
        'deleted_at'    => 'Please select deleted',
        'created_at'    => 'Please select created',
        'updated_at'    => 'Please select updated',
    ],

    /**
     * Labels for inputs.
     */
    'label'       => [
        'id'            => 'Id',
        'title'         => 'Title',
        'details'       => 'Details',
        'images'        => 'Images',
        'slug'          => 'Slug',
        'status'        => 'Status',
        'user_id'       => 'User',
        'user_type'     => 'User type',
        'upload_folder' => 'Upload folder',
        'deleted_at'    => 'Deleted',
        'created_at'    => 'Created',
        'updated_at'    => 'Updated',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'     => [
        'title'     => ['name' => 'Title', 'data-column' => 1, 'checked'],
        'published' => ['name' => 'Published', 'data-column' => 2, 'checked'],
        'status'    => ['name' => 'Status', 'data-column' => 3, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'         => [
        'name' => 'Galleries',
    ],

    /**
     * Texts  for the module
     */
    'text'        => [
        'preview' => 'Click on the below list for preview',
    ],
];
