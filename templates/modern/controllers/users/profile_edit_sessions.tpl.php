<?php

    $this->setPageTitle(LANG_USERS_SESSIONS);

    $this->addBreadcrumb(LANG_USERS, href_to('users'));
    $this->addBreadcrumb($profile['nickname'], href_to('users', $id));
    $this->addBreadcrumb(LANG_USERS_EDIT_PROFILE, href_to('users', $id, 'edit'));
    $this->addBreadcrumb(LANG_USERS_SESSIONS);

    $this->renderChild('profile_edit_header', array('profile'=>$profile));
?>
<div class="alert alert-info">
    <?php echo LANG_SESSIONS_HINT; ?>
</div>
    <table class="table table-bordered table-sm table-striped table-hover">
        <tr>
            <th><?php echo LANG_SESS_TYPE; ?></th>
            <th><?php echo LANG_SESS_LAST_DATE; ?></th>
            <th><?php echo LANG_SESS_IP; ?></th>
            <th class="actions"></th>
        </tr>
        <?php if($sessions){ ?>
            <?php foreach ($sessions as $session) { ?>

                <tr>
                    <td>
                        <?php echo string_lang('LANG_SESS_'.$session['access_type']['type']); ?>
                    </td>
                    <td>
                        <?php echo string_date_age_max($session['date_log'], true); ?>
                    </td>
                    <td>
                        <a target="_blank" href="https://apps.db.ripe.net/search/query.html?searchtext=<?php echo $session['ip']; ?>#resultsAnchor">
                            <?php echo $session['ip']; ?>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo $this->href_to($id, array('edit', 'sessions_delete', $session['id'])); ?>"><?php echo LANG_SESS_DROP; ?></a>
                    </td>
                </tr>

            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="empty" colspan="3">
                    <?php echo LANG_SESS_NOT_FOUND; ?>
                </td>
            </tr>
        <?php } ?>
    </table>