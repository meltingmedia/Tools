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
$target = $scriptProperties['target'];
$photoUrl = $scriptProperties['photoUrl'];
$picture = $hook->getValue($scriptProperties['photoField']);

if (empty($target) || empty($photoUrl) || empty($scriptProperties['photoField'])) {
    $configError = 'target, photoUrl and/or photoField properties not defined (all are required).';
    //$hook->addError('message', $configError);
    $modx->log(modX::LOG_LEVEL_ERROR, $configError);
    return false;
}

if(!empty($picture['name'])) {
    /**
     * array $photo
     * [name], [type], [tmp_name], [error], [size]
     */
    // @TODO: define some allowed file extensions
    $ext = pathinfo($picture['name'], PATHINFO_EXTENSION);
    $filename = $user->get('username').'-profile.'.$ext;
    // @TODO: make sure the filename is unique & "web URL" compatible
    $targetPhoto = $target.$filename;

    if (!move_uploaded_file($picture['tmp_name'], $targetPhoto)) {
        //$hook->addError($picture, 'File not uploaded');
        return false;
    }

    // Everything went fine, let's define the picture URL
    $profile->set('photo', $photoUrl.$filename);
    $profile->save();
    //$hook->addError($picture, 'Everything ok');

}

return true;