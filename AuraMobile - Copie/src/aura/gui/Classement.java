/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aura.gui;

import aura.entities.classement;
import aura.services.ServiceClassement;
import com.codename1.components.MultiButton;
import com.codename1.components.SpanLabel;
import static com.codename1.ui.Component.CENTER;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;
import java.util.ArrayList;
import java.util.Iterator;

/**
 *
 * @author NOUR
 */
public class Classement extends Form {
    public  Classement (){
        
        ArrayList<classement> classements = new ArrayList<>();
          classement  classement= new classement();

               
           classements=ServiceClassement.getInstance().getClassements();

           
        this.setTitle("Classement");
        //this.setLayout(BoxLayout.y());
        // this.setLayout(new TableLayout(2, 2));
       

        //*************** spanlabel ******************
        
       /* SpanLabel tasksListSP = new SpanLabel();
         for (Iterator<classement> it = classements.iterator(); it.hasNext();) {
            classement = it.next();
            
            
             tasksListSP.setText(classement.toString());
             System.out.println("liste="+tasksListSP.getText());
         
         }
        
        
        tasksListSP.setText(ServiceClassement.getInstance().getClassements().toString());
        
        
        
        this.add(tasksListSP);
         this.show();*/
       
     
      
    
        this.setLayout(new BorderLayout());
        Container listeCL =new Container (BoxLayout.y());
         listeCL.setScrollableY(true);
         for (Iterator<classement> it = classements.iterator(); it.hasNext();) {
            classement = it.next();
           
            
            MultiButton mbCL= new MultiButton();
            
          
            mbCL.setTextLine1("Position: "+Integer.toString(classement.getPosition()));
            mbCL.setTextLine2(" Client: "+classement.getIdClient());
            mbCL.setTextLine3("Niveau: "+Integer.toString(classement.getIdNiveau()));

            mbCL.setTextLine4("Nb Points: "+Integer.toString(classement.getNbPoints()));

            
             
            
            listeCL.add(mbCL);
          //  mb.isSelected(); chekbox selected 
          
           }
         
         this.add(CENTER,listeCL);
         this.show();
         
         
         
     
          
     
   
     
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, ev-> new HomeClient().showBack());
    
    
    }
    
}
