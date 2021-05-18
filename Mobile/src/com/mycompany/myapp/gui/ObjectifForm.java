/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.gui;

import com.codename1.components.ImageViewer;
import com.codename1.components.SpanLabel;
import com.codename1.notifications.LocalNotification;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Display;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.Stroke;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.FlowLayout;
import com.codename1.ui.layouts.GridLayout;
import com.codename1.ui.layouts.LayeredLayout;
import com.codename1.ui.plaf.RoundBorder;
import com.codename1.ui.plaf.UIManager;
import com.codename1.ui.util.Resources;
import com.mycompany.myapp.entities.Objectif;
import com.mycompany.myapp.services.ServiceObjectif;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.List;

/**
 *
 * @author bhk
 */
public class ObjectifForm extends Form {

    Form current;
    private Resources theme;
    private Resources res;


    /*Garder traçe de la Form en cours pour la passer en paramètres 
    aux interfaces suivantes pour pouvoir y revenir plus tard en utilisant
    la méthode showBack*/
    public ObjectifForm() {
        current = this; //Récupération de l'interface(Form) en cours
        theme = UIManager.initFirstTheme("/theme");
        setTitle("Mes Objectifs");
        setLayout(BoxLayout.y());
        Button btnAddObjectif = new Button("Ajouter");
        Button btnCaptureObjectif = new Button("Capture");
        Button btnStatObjectif = new Button("Stats");
        Button btnCalendar = new Button("Calendrier");
        
        Label backimg = new Label(theme.getImage("back.png"));
        String dateAuj = new SimpleDateFormat("yyyy-MM-dd").format(Calendar.getInstance().getTime());
        //Button btnListTasks = new Button("List Tasks");
        btnAddObjectif.addActionListener(e -> new AddObjectifForm(current, dateAuj).show());
        btnCaptureObjectif.addActionListener(e -> new CaptureObjectif().show());
        btnCalendar.addActionListener(e -> new CalendarForm().show());

        btnStatObjectif.addActionListener(e -> {
            StatObjectif sat = new StatObjectif();
            sat.execute(theme).show();

        });

        // btnListTasks.addActionListener(e -> new ShowObjectifForm(current).show());
        add(backimg);
        add(LayeredLayout.encloseIn(
                GridLayout.encloseIn(3, btnAddObjectif, btnStatObjectif, btnCaptureObjectif, btnCalendar)
        ));
        //Affichge de la liste des objectifs
        List<Objectif> list = ServiceObjectif.getInstance().getAllObjectifs();
        for (Objectif e : list) {
            Container cnt1 = new Container(BoxLayout.y());
            Container cnt2 = new Container(BoxLayout.x());;

            SpanLabel lbdesc = new SpanLabel("Description :" + e.getDescription());
            SpanLabel lbrep = new SpanLabel("Réponse :" + e.getReponse());
            //Label lbimg = new Label(theme.getImage(e.getIcone()));
            Label img = new Label(theme.getImage(e.getIcone()));
            Button btnDetails = new Button("Détails");
            btnDetails.getStyle().setBgColor(0x99CCCC);
            cnt1.add(lbdesc);
            cnt1.add(lbrep);
            cnt1.add(btnDetails);
            cnt2.add(img);
            cnt2.add(cnt1);
            cnt2.getStyle().setBgColor(0x99CCCC);
            cnt2.getStyle().setBgTransparency(255);

            Stroke borderStroke = new Stroke(2, Stroke.CAP_SQUARE, Stroke.JOIN_MITER, 1);
            cnt2.getStyle().setBorder(RoundBorder.create().
                    rectangle(true).
                    color(0xffffff).
                    strokeColor(0).
                    strokeOpacity(120).
                    stroke(borderStroke));
            add(cnt2);
            btnDetails.addActionListener(p -> new DetailsObjectifForm(current, e, theme).show());

        }

    }
}
