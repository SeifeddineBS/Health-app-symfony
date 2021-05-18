/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aura.gui;

import static com.codename1.ui.Component.CENTER;
import java.util.*;
import aura.entities.challenge;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import aura.services.ServiceChallenge;
import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BorderLayout;
import java.util.ArrayList;
/**
 *
 * @author NOUR
 */
public class MesChallenges extends Form{
      public MesChallenges(){
        
         ArrayList<challenge> Meschallenges = new ArrayList<>();
          challenge challenge= new challenge();

               
           Meschallenges=ServiceChallenge.getInstance().getMesChallenges();
           boolean test;


           
        this.setTitle(" Mes Challenges ");

        
        this.setLayout(new BorderLayout());
        Container listeMC =new Container (BoxLayout.y());
                listeMC.setScrollableY(true);

         for (challenge ch:Meschallenges) {
            
            
            String tr=ch.getTitre();
            
            MultiButton mbMC= new MultiButton("titre : "+tr+"   de niv:"+Integer.toString(ch.getIdNiveau()));
            mbMC.setTextLine2(ch.getDateDebut().toString());
            mbMC.setTextLine3(ch.getDateFin().toString());
            mbMC.setTextLine4(ch.getDescription());
             // mb.isSmoothScrolling();
              
            mbMC.setCheckBox(false);
            Button btnFI=new Button("finir");
              btnFI.addActionListener(z-> ServiceChallenge.getInstance().finirChallenges(ch,"87654321"));
             listeMC.add(mbMC);
            listeMC.add(btnFI);
                         
               
               
               
            

             
          // if(mb.isCheckBox()){ System.out.println("check box  "); if(mb.isSelected()){ test=ServiceChallenge.getInstance().finirChallenges(challenge,"87654321");System.out.println("selected ");} else {System.out.println("not selected  ");}} else {System.out.println("not a check box  ");}

           
            System.out.println("liste ");
           // if(mb.isCheckBox()){ System.out.println("check box  "); if(mb.isSelected()){ test=ServiceChallenge.getInstance().finirChallenges(challenge,"87654321");System.out.println("selected ");} else {System.out.println("not selected  ");}} else {System.out.println("not a check box  ");}

            
            //if(mb.isSelected()){ test=ServiceChallenge.getInstance().finirChallenges(challenge,"87654321");System.out.println("selected ");} else {System.out.println("not selected  ");}
          //  mb.isSelected(); chekbox selected 
          
           }
         
         this.add(CENTER,listeMC);
         this.show();
         
     
     
     
   
     
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, ev-> new HomeClient().showBack());
        

        
    }
    
}
