<?php
/**
 * ProfilePhoto
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
$path = $scriptProperties['path'];
$path_url = $scriptProperties['path_url'];
$field = $scriptProperties['field'];
$fieldValue = $hook->getValue($field);

if (empty($path) || empty($path_url) || empty($field)) {
    $configError = 'path, path_url and/or field properties not defined (all are required).';
    //$hook->addError('message', $configError);
    $modx->log(modX::LOG_LEVEL_ERROR, $configError);
    return false;
}

if(!empty($fieldValue['name'])) {
    /**
     * array $fieldValue
     * [name], [type], [tmp_name], [error], [size]
     */
    // @TODO: define some allowed file extensions
    $ext = pathinfo($fieldValue['name'], PATHINFO_EXTENSION);
    $filename = $user->get('username').'-profile.'.$ext;
    // @TODO: make sure the filename is unique & "web URL" compatible
    $full_path = $path.$filename;
    $full_url = $path_url.$filename;

    if (!move_uploaded_file($fieldValue['tmp_name'], $full_path)) {
        //$hook->addError($picture, 'File not uploaded');
        return false;
    }

    // Everything went fine, let's define the picture URL
    $profile->set('photo', $full_url);
    $profile->save();

}

// @TODO: allow a way to remove the profile picture

return true;