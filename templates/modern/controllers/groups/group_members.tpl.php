<div id="group_profile_header">
    <?php $this->renderChild('group_header', array('group' => $group)); ?>
</div>

<div class="content_datasets">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <?php if (!$current_role_id){ ?>
                <div class="nav-link active"><?php echo LANG_ALL; ?></div>
            <?php } else { ?>
                <a class="nav-link" href="<?php echo href_to('groups', $group['slug'], 'members'); ?>"><?php echo LANG_ALL; ?></a>
            <?php } ?>
        </li>
        <?php if ($group['roles']){ ?>
            <?php foreach($group['roles'] as $role_id => $title){ ?>
                <?php $selected = ($role_id == $current_role_id); ?>
                <li class="nav-item">
                    <?php if ($selected){ ?>
                        <div class="nav-link active"><?php echo $title; ?></div>
                    <?php } else { ?>
                        <a class="nav-link" href="<?php echo href_to('groups', $group['slug'], array('members', $role_id)); ?>"><?php echo $title; ?></a>
                    <?php } ?>
                </li>
            <?php } ?>
        <?php } ?>
        <li class="nav-item">
            <?php if ($current_role_id == -1){ ?>
                <div class="nav-link active"><?php echo LANG_GROUPS_EDIT_STAFF; ?></div>
            <?php } else { ?>
                <a class="nav-link" href="<?php echo href_to('groups', $group['slug'], array('members', -1)); ?>"><?php echo LANG_GROUPS_EDIT_STAFF; ?></a>
            <?php } ?>
        </li>
    </ul>
</div>

<div id="user_content_list"><?php echo $profiles_list_html; ?></div>