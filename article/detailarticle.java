/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aura.gui.article;

import aura.entities.User;
import aura.entities.article;
import aura.gui.Listact;
import aura.gui.Listth;
import aura.gui.objectif.ObjectifForm;
import aura.services.ServiceArticle;
import aura.services.ServiceUser;
import com.codename1.components.MultiButton;
import com.codename1.components.SpanLabel;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.Font;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.Toolbar;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.FlowLayout;
import java.util.ArrayList;

/**
 *
 * @author akram
 */
public class detailarticle extends Form {

    Form current;
    String username;
    User user;

    public detailarticle(String idUser, int id, String Titre, String Themee, String Auteur, String Datee, String Article, boolean favo, String username) {
        this.setTitle(Titre);
        this.username = username;
        this.user = ServiceUser.getInstance().getUser(this.username);
        //***************************************SIDE MENU********************
        Toolbar tb = this.getToolbar();
        Form forms = new Form();
//Image icon=theme.getImage("logo.png");
        Container topbar = BorderLayout.east(new Label());
        topbar.add(BorderLayout.SOUTH, new Label("AURA"));
        topbar.setUIID("SideCommand");
        tb.addComponentToSideMenu(topbar);

        tb.addMaterialCommandToSideMenu("Therapie", FontImage.MATERIAL_RECORD_VOICE_OVER, ev -> {
            new Listth(current, username);

        });
        tb.addMaterialCommandToSideMenu("Activite", FontImage.MATERIAL_EXTENSION, ev -> {
            new Listact(current, username);

        });
        tb.addMaterialCommandToSideMenu("Objectifs", FontImage.MATERIAL_CHECK, ev -> {
            new ObjectifForm(username);

        });
        tb.addMaterialCommandToSideMenu("Articles", FontImage.MATERIAL_ARTICLE, ev -> {
            new HomeArticle(username).show();

        });
//***************************************End SIDE MENU********************
        this.setLayout(new BorderLayout());
        //((BorderLayout)this.getLayout()).setCenterBehavior(BorderLayout.CENTER_BEHAVIOR_CENTER);
        ServiceArticle s = new ServiceArticle();
        SpanLabel a = new SpanLabel(s.gettext(id));
        a.getTextAllStyles().setFont(Font.createSystemFont(Font.FACE_SYSTEM, Font.STYLE_BOLD, Font.SIZE_MEDIUM));

        this.add(BorderLayout.CENTER, a);

        Container cnt2 = FlowLayout.encloseIn();

        Button supprimer = new Button("supprimer");
        Button modifier = new Button("modifier");
        Button favoris = new Button("ajouter favoris");

        supprimer.addActionListener(
                new ActionListener() {

                    @Override
                    public void actionPerformed(ActionEvent evt) {
                        if (ServiceArticle.getInstance().deletedArticle(id)) {
                            Dialog.show("Success", "article supprimer avec succès", new Command("OK"));
                        }
                    }
                });
        supprimer.addActionListener(e -> ServiceArticle.getInstance().deletedArticle(id));
        modifier.addActionListener(e -> new updatearticle(idUser, id, Titre, Themee, Auteur, Datee, Article, username).show());
        favoris.addActionListener(e -> {
            if (ServiceArticle.getInstance().favo(id, user.getId())) {
                Dialog.show("Success", "article ajouter aux favoris", new Command("OK"));
                favoris.setEnabled(false);
                favoris.setText("déja ajouté");
            }
        }
        );
        System.out.println(favo);
        if (!favo) {
            
            cnt2.add(favoris);
        }
            System.out.println(idUser+"   "+user.getId());
        if (idUser.equals(user.getId())) {
            cnt2.addAll(supprimer, modifier);
            
        }
        this.add(BorderLayout.NORTH, cnt2);
        if (!favo) {
            getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, ev -> new ListArticle(username).showBack());
        } else {
            getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, ev -> new listefavoris(username).showBack());
        }
    }
}
