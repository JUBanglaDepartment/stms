<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">



            <?php  if(@$controller  == 'SendSMS' ){ ?> 
            <li class="nav-item start active open">
                <?php } else{  ?>
                <li class="nav-item">
               <?php  }  ?>
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-envelope"></i>
                    <span class="selected"></span>
                    <span class="title">Send SMS</span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="<?php echo base_url('SendSMS/sendSMSFromPanel');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">Single SMS</span>
                        </a>
                    </li>

                    <li class="nav-item start ">
                        <a href="<?php echo base_url('SendSMS/sendSMSByExcel');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">BULK SMS</span>
                        </a>
                    </li>

                    <li class="nav-item start ">
                        <a href="<?php echo base_url('UnderConstruction/index');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">Group SMS</span>
                        </a>
                    </li>

                    <li class="nav-item start ">
                        <a href="<?php echo base_url('UnderConstruction/index');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">Send SMS AS Campaign</span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Address Book</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span class="title">Contacts</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="<?php echo base_url('UnderConstruction/index');?>" class="nav-link ">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span class="title">Add Contact</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="ui_colors.html" class="nav-link ">
                            <i class="fa fa-group" aria-hidden="true"></i>
                            <span class="title">Groups</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="<?php echo base_url('UnderConstruction/index');?>" class="nav-link ">
                                    <i class="fa fa-group" aria-hidden="true"></i>
                                    <span class="title">Create Group</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="ui_colors.html" class="nav-link ">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            <span class="title">Campaign</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="<?php echo base_url('UnderConstruction/index');?>" class="nav-link ">
                                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                    <span class="title">Create Campaign</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>


            <?php  if(@$controller  == 'SMSLog' || @$controller  == 'Credit' || @$controller  == 'OperatorRoute'){ ?> 
            <li class="nav-item start active open">
                <?php } else{  ?>
                <li class="nav-item">
               <?php  }  ?>
            
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    <span class="title">Report</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="<?php echo base_url('SMSLog/smsLogShow');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">SMS Sent Report</span>
                        </a>
                    </li>

                    <li class="nav-item start ">
                        <a href="<?php echo base_url('Credit/creditHistoryView');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">Credit Report</span>
                        </a>
                    </li>

                    <li class="nav-item start ">
                        <a href="<?php echo base_url('OperatorRoute/operatorRouteView');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">My Operator</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="<?php echo base_url('ApiDoc/index');?>" class="nav-link nav-toggle">
                    <i class="fa fa-gg"></i>
                    <span class="title">API</span>
                    <span class="arrow"></span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Utility</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo base_url('UnderConstruction/index');?>" class="nav-link ">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            <span class="title">Filter Mobile Numbers</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->