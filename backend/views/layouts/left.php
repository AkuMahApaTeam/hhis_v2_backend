<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel" style="text-align: center">
            <div class="center">
                <img src="<?=Yii::getAlias('@web')."/img/itspng.png"?>" height="auto" width="150px" alt="User Image"/>
            </div><br>
            <div style="color: #ffffff">
                <b>Health History<br>
                    Information System
                </b>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
        </ul>
        <?php

        use hscstudio\mimin\components\Mimin;
        $menuItems = backend\components\SidebarMenu::getMenu();

        //$menuItems = Mimin::filterMenu($menuItems);

        ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
