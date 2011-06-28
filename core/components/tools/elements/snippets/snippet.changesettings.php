<?php
/*
 * Changes system settings. In that case the purpose is to set
 * defaults emails template in French.
 *
 * Usage
 * Call once [[!changeSettings]]
 *
 */

$forgot_login_email = $modx->getObject('modSystemSetting','forgot_login_email');
$forgot_login_email->set('value',"<p>Bonjour [[+username]],</p>
<p>Une demande de mise à jour de mot de passe de votre compte a été faite. Si vous êtes à l'origine de cette demande, veuillez suivre les instructions suivantes, si non, veuillez simplement ignorer cet e-mail.</p>

<p>
    <strong>Lien d'activation:</strong> [[+url_scheme]][[+http_host]][[+manager_url]]?modahsh=[[+hash]]<br />
    <strong>Identifiant:</strong> [[+username]]<br />
    <strong>Mot de passe:</strong> [[+password]]<br />
</p>

<p>Si vous le souhaitez, vous pouvez modifier votre mot de passe dans le manager de MODX.</p>

<p>Cordialement,<br />L'administrateur du site.</p>");
$forgot_login_email->save();

$signupemail_message = $modx->getObject('modSystemSetting','signupemail_message');
$signupemail_message->set('value',"<p>Bonjour [[+uid]],</p>
    <p>Voici les informations de connexion au manager MODX du site [[+sname]] :</p>

    <p>
        <strong>Identifiant:</strong> [[+uid]]<br />
        <strong>Mot de passe:</strong> [[+pwd]]<br />
    </p>

    <p>Une fois connecté à [[+surl]], vous pourrez changer votre mot de passe.</p>

    <p>Cordialement,<br />L'administrateur du site.</p>");
$signupemail_message->save();

$webpwdreminder_message = $modx->getObject('modSystemSetting','webpwdreminder_message');
$webpwdreminder_message->set('value',"<p>Bonjour [[+uid]],</p>

    <p>Pour activer votre nouveau mot de passe, veuillez vous rendre à l'adresse:</p>

    <p>[[+surl]]</p>

    <p>Vous pourrez ensuite utiliser le mot de passe suivant pour vous connecter:</p>

    <p><strong>Mot de passe:</strong> [[+pwd]]</p>

    <p>Si vous n'êtes pas à l'origine de cette demande, veuillez ignorer cet e-mail.</p>

    <p>Cordialement,<br />
    L'administrateur du site.</p>");
$webpwdreminder_message->save();

$websignupemail_message = $modx->getObject('modSystemSetting','websignupemail_message');
$websignupemail_message->set('value',"<p>Bonjour [[+uid]],</p>

    <p>Voici vos informations de connexion pour [[+sname]]:</p>

    <p><strong>Identifiant:</strong> [[+uid]]<br />
    <strong>Mot de passe:</strong> [[+pwd]]</p>

    <p>Vous pourrez changer votre mot de passe une fois connecté à [[+sname]] en vous rendant à l'adresse [[+surl]].</p>

    <p>Cordialement,<br />
    L'administrateur du site</p>");
$websignupemail_message->save();

/*
$var = $modx->getObject('modSystemSetting','');
$var->set('value',"");
$var->save();
*/

// for Revo 2.1* +
$cacheRefreshOptions =  array( 'system_settings' => array() );
$modx->cacheManager-> refresh($cacheRefreshOptions);

// for older releases (you should upgrade!)
//$modx->cacheManager->clearCache();

return 'Should be done';