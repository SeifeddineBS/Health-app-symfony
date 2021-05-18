/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.gui;

import static com.codename1.push.PushContent.setTitle;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.mycompany.myapp.entities.Client;
import com.mycompany.myapp.entities.Objectif;
import com.mycompany.myapp.services.ServiceObjectif;

/**
 *
 * @author Chirine
 */
public class AddObjectifForm extends Form{
     public AddObjectifForm(Form previous, String datee) {
        
        setTitle("Ajouter un objectif");
        setLayout(BoxLayout.y());
        
        TextField tfDesc = new TextField("","Description");
        TextField tfRep= new TextField("", "Réponse");
        TextField tfDateDebut= new TextField("", "Date de début");
        tfDateDebut.setText(datee);
        TextField tfDuree= new TextField("", "Duree");
        TextField tfAdmin= new TextField("", "ID Admin"); // a changeeeer!!!!!!!!!!!

        Button btnValider = new Button("Confirmer");
        
        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((tfDesc.getText().length()==0)||(tfRep.getText().length()==0)||(tfDateDebut.getText().length()==0)||(tfDuree.getText().length()==0)||(tfAdmin.getText().length()==0))
                    Dialog.show("Alerte", "Veuillez remplir tous les champs", new Command("OK"));
                else
                {
                    try {
                        Objectif t = new Objectif();
                        t.setDescription(tfDesc.getText());
                        t.setReponse(Integer.parseInt(tfRep.getText()));
                        t.setDate(tfDateDebut.getText());
                        t.setDuree(Integer.parseInt(tfDuree.getText()));
                        
                        Client c= new Client();
                        c.setId("12345698");
                        t.setCli(c);
                        if( ServiceObjectif.getInstance().addObjectif(t))
                            Dialog.show("Success","Connection accepted",new Command("OK"));
                        else
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }
                    
                }
                            
            }
        });
        
        addAll(tfDesc, tfRep, tfDateDebut, tfDuree,tfAdmin,btnValider);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK
                , e-> previous.showBack()); // Revenir vers l'interface précédente
                
    }

    private void setLayout(BoxLayout y) {
    }
    
}
