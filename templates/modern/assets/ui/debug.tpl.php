<?php
$points_data = cmsDebugging::getPointsData();
$points_tab = cmsDebugging::getPointsTargets();
?>
<div id="debug_widget" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <?php foreach($points_tab as $tab_name => $tab) { ?>
                        <li class="nav-item">
                            <a class="nav-link<?php echo $tab_name == 'db' ? ' active': ''; ?>"
                               id="debug-<?php echo $tab_name; ?>-tab"
                               data-toggle="tab"
                               href="#debug-<?php echo $tab_name; ?>"
                               role="tab"
                               aria-controls="debug-<?php echo $tab_name; ?>"
                               aria-selected="<?php echo $tab_name == 'db' ? 'true': 'false'; ?>">
                                <?php echo $tab['title']; ?><?php echo $tab['count'] ? ' <sup>' . $tab['count'] . '</sup>' : ''; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                <?php foreach($points_data as $tab_name => $data) { ?>
                    <div class="tab-pane fade<?php echo $tab_name == 'db' ? ' show active': ''; ?>" id="debug-<?php echo $tab_name; ?>" role="tabpanel" aria-labelledby="debug-<?php echo $tab_name; ?>-tab">
                        <div class="queries_wrap">
                            <?php foreach($data as $query) { ?>
                                <div class="query">
                                    <div class="src"><?php echo $query['src']; ?></div>
                                    <?php if($query['data']){ ?>
                                        <div class="debug_data">
                                            <?php echo isset($query['data_callback']) ? $query['data_callback']($query['data']) : nl2br(htmlspecialchars($query['data'])); ?>
                                        </div>
                                    <?php } ?>
                                    <?php if($query['time']){ ?>
                                        <div class="query_time">
                                            <?php echo LANG_DEBUG_QUERY_TIME; ?>
                                            <span class="<?php echo (($query['time']>=0.1) ? 'red_query' : 'green_query'); ?>">
                                                <?php echo $query['time']; ?>
                                            </span>
                                            <?php echo LANG_SECOND10 ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>