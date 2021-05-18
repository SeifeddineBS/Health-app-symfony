/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.gui;

import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;

/**
 *
 * @author Chirine
 */
public class CalendarForm extends Form {

    public CalendarForm() {
        setTitle("Mon agenda");

        Form formm = new ObjectifForm();
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                e -> formm.showBack());
        Form f = new ObjectifForm();
        Container cnt = new CalendrierObj(f);
        add(cnt);

    }

}
