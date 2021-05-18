/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aura.gui;

import aura.entities.challenge;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import aura.services.ServiceChallenge;
import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.layouts.BorderLayout;
import java.util.ArrayList;
import java.util.*;
/**
 *
 * @author NOUR
 */
public class ListChallengesForm extends Form{
    public ListChallengesForm(){
        
          ArrayList<challenge> challenges = new ArrayList<>();
          challenge challenge= new challenge();

               
           challenges=ServiceChallenge.getInstance().getChallenges();
           boolean test;

           
        this.setTitle("List des Challenges ");
        //this.setLayout(BoxLayout.y());
        // this.setLayout(new TableLayout(2, 2));
       

        //*************** spanlabel ******************
        
       /* SpanLabel tasksListSP = new SpanLabel();
        tasksListSP.setText(ServiceChallenge.getInstance().getChallenges().toString());
        System.out.println("liste="+tasksListSP.getText());
       if(tasksListSP.getText()!="") {System.out.println("niiiiiiiiice");} else {System.out.println("faiiiiiiiiiiil ");}
        
        
        this.add(tasksListSP);*/
       
     
      
        
        this.setLayout(new BorderLayout());
        Container listeCH =new Container (BoxLayout.y());
        listeCH.setScrollableY(true);
         for (challenge ch : challenges) {
          
            String tr=ch.getTitre();
            
            MultiButton mbCH= new MultiButton("titre : "+tr+"   de niv:"+Integer.toString(ch.getIdNiveau()));
            mbCH.setTextLine2(ch.getDateDebut().toString());
             mbCH.setTextLine3(ch.getDateFin().toString());
              mbCH.setTextLine4(ch.getDescription());
           mbCH.setCheckBox(false);
            Button btnRE=new Button("rejoindre");
             System.out.println("challenge id :"+ch.getId());
             System.out.println(" challenge ch"+ch);
             btnRE.addActionListener(y-> ServiceChallenge.getInstance().rejoindreChallenges(ch.getId(),"87654321"));
             listeCH.add(mbCH);
            listeCH.add(btnRE);
            
           // if(mb.isSelected()){ test=ServiceChallenge.getInstance().rejoindreChallenges(challenge.getId(),"87654321");}
          //  mb.isSelected(); chekbox selected 
          
           }
         
         this.add(CENTER,listeCH);
         this.show();
         
     
     
     
   
     
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, ev-> new HomeClient().showBack());
        
    }
    
}
