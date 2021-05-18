/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aura.gui;


import com.codename1.ui.Button;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import static com.codename1.ui.CN.*;
import com.codename1.ui.Display;
import com.codename1.ui.Dialog;
import com.codename1.ui.Label;
import com.codename1.ui.plaf.UIManager;
import com.codename1.ui.util.Resources;
import com.codename1.io.Log;
import com.codename1.ui.Toolbar;
import java.io.IOException;
import com.codename1.io.NetworkEvent;
import aura.gui.HomeClient;
import com.codename1.ui.Command;

/**
 *
 * @author NOUR
 */
public class HomeClient extends Form {
    public HomeClient(){
        
        this.setTitle("Home Form");
        this.setLayout(BoxLayout.y());
        
        Button listChallengesBtn = new Button("Liste des Challenges ");
        Button MesChallengesBtn = new Button("Mes Challenges");
          Button ClassementBtn = new Button("Classement");
      
        listChallengesBtn.addActionListener(x-> new ListChallengesForm().show());
        MesChallengesBtn.addActionListener(y-> new MesChallenges().show());
         ClassementBtn.addActionListener(z-> new Classement().show());
       
        this.addAll(listChallengesBtn,MesChallengesBtn,ClassementBtn);
        
    }


    
}
