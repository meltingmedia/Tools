<?php
/**
 * photo
 *
 * A Login.UpdateProfile post hook to allow users to upload a photo
 * for their profile
 *
 * @var $modx modX
 * @var array $scriptProperties
 * @var $hook LoginHooks
 */
$user = $modx->user;
$profile = $user->getOne('Profile');
$path = $scriptProperties['photo_path'];
$path_url = $scriptProperties['photo_path_url'];
$field = $scriptProperties['photo_field'];
$fieldValue = $hook->getValue($field);

//$field_error = '';
$configError = ' field property not defined.';
if (empty($path)) {
    $field_error = 'photo_path';
    $modx->log(modX::LOG_LEVEL_ERROR, $field_error.$configError);
    return false;
}
if (empty($path_url)) {
    $field_error = 'photo_path_url';
    $modx->log(modX::LOG_LEVEL_ERROR, $field_error.$configError);
    return false;
}
if (empty($field)) {
    $field_error = 'photo_field';
    $modx->log(modX::LOG_LEVEL_ERROR, $field_error.$configError);
    return false;
}

if(!empty($fieldValue['name'])) {
    /**
     * array $fieldValue
     * [name], [type], [tmp_name], [error], [size]
     */
    // @TODO: define some allowed file extensions
    $ext = '.'.pathinfo($fieldValue['name'], PATHINFO_EXTENSION);
    $filename = $scriptProperties['photo_filename'] ? $scriptProperties['photo_filename'].$ext : $user->get('username').'-profile'.$ext;
    // @TODO: make sure the filename is unique & "web URL" compatible
    $full_path = $path.$filename;
    $full_url = $path_url.$filename;

    if (!move_uploaded_file($fieldValue['tmp_name'], $full_path)) {
        //$hook->addError($field, 'File not uploaded');
        return false;
    }

    // Everything went fine, let's define the picture URL
    $profile->set('photo', $full_url);
    $profile->save();

}

// @TODO: allow a way to remove the profile picture

return true;