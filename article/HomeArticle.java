/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package aura.gui.article;

import aura.entities.User;
import aura.gui.Listact;
import aura.gui.Listth;
import aura.gui.objectif.ObjectifForm;
import aura.services.ServiceUser;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.Toolbar;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;

/**
 *
 * @author akram
 */
public class HomeArticle extends Form{
    Form current;
    String username ;
    User user;
    public HomeArticle(String username ){
       this.username=username;
       this.user=ServiceUser.getInstance().getUser(this.username);
        System.out.println(this.user.getId());
        this.setTitle("Article");
        this.setLayout(BoxLayout.y());
        
        //***************************************SIDE MENU********************
        Toolbar tb= this.getToolbar();
                 Form forms = new Form();
//Image icon=theme.getImage("logo.png");
Container topbar=BorderLayout.east(new Label());
topbar.add(BorderLayout.SOUTH,new Label("AURA"));
topbar.setUIID("SideCommand");
tb.addComponentToSideMenu(topbar);

        tb.addMaterialCommandToSideMenu("Therapie", FontImage.MATERIAL_RECORD_VOICE_OVER, ev->{
                         new Listth(current,username);
                         

        });
          tb.addMaterialCommandToSideMenu("Activite", FontImage.MATERIAL_EXTENSION, ev->{
                         new Listact(current,username);
                         

        });
           tb.addMaterialCommandToSideMenu("Objectifs", FontImage.MATERIAL_CHECK, ev->{
                         new ObjectifForm(username);
                         

        });
           tb.addMaterialCommandToSideMenu("Articles", FontImage.MATERIAL_ARTICLE, ev -> {
            new HomeArticle(username).show();

        });
//***************************************End SIDE MENU********************
        
        Button addTaskBtn = new Button("Ajouter Article");
        Button listTasksBtn = new Button(" Liste Article");
        Button listfavo = new Button(" Article Favoris");
        //Button updateArticle = new Button("update");
        addTaskBtn.addActionListener(e -> new AddArticle(username).show());
        listTasksBtn.addActionListener(e-> new ListArticle(username).show());
        listfavo.addActionListener(e-> new listefavoris(username).show());
      //  updateArticle.addActionListener(e-> new updatearticle().show());
        this.addAll(addTaskBtn, listTasksBtn,listfavo);
        
    }
    
}
