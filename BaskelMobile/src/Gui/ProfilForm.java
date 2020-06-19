/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Gui;

import com.codename1.ui.FontImage;
import Entities.User;
import Services.ServiceUser;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.Form;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Component;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.FlowLayout;
import com.codename1.ui.plaf.Style;
import Entities.User;
import Services.ServiceUser;
import com.codename1.ui.util.Resources;

/**
 *
 * @author Aziz Sayeb
 */
public class ProfilForm extends Form {
   Form current;
Resources theme;
    private com.codename1.ui.Container gui_Container_2 = new com.codename1.ui.Container(new com.codename1.ui.layouts.BoxLayout(com.codename1.ui.layouts.BoxLayout.Y_AXIS));
private com.codename1.ui.TextField lb_Email = new com.codename1.ui.TextField();
private com.codename1.ui.TextField lb_Username = new com.codename1.ui.TextField();
    private com.codename1.ui.Button btnEditTask = new com.codename1.ui.Button();
        private com.codename1.ui.Button btnPassOubtTask = new com.codename1.ui.Button();

    ProfilForm( String username) {
        current=this;
         InboxForm(theme);
          InboxForm(theme);
        
        addComponent(com.codename1.ui.layouts.BorderLayout.CENTER, gui_Container_2);
        Home a = new Home(username);
        a.addMenu(this, username);
        gui_Container_2.setScrollableY(true);
        gui_Container_2.setName("Container_2");
User t=ServiceUser.getInstance().getUser(username);
        gui_Container_2.setName("Component_Group_2");
        gui_Container_2.addComponent(lb_Email);
        lb_Email.setHint("please enter your Email");
        lb_Email.setName("Text_Field_2");
        lb_Email.setUIID("CenterWhite");
        gui_Container_2.addComponent(lb_Username);
        lb_Username.setHint("please enter your Email");
        lb_Username.setName("Text_Field_2");
        lb_Username.setUIID("CenterWhite");
        lb_Username.setText("Username: " +username);
        lb_Email.setText("Email: " +t.getEmail());
        gui_Container_2.addComponent(btnEditTask);
        gui_Container_2.setName("Component_Group_2");
        btnEditTask.setText("Edit Profil");
        btnEditTask.setUIID("CalendarHourSelected");
        btnEditTask.setName("Button_2");
        gui_Container_2.addComponent(btnPassOubtTask);
        gui_Container_2.setName("Component_Group_2");
        btnPassOubtTask.setText("Change Password");
        btnPassOubtTask.setUIID("CalendarHourSelected");
        btnPassOubtTask.setName("Button_2");
        
       
        btnEditTask.addActionListener(e-> new EditForm(current,username).show());
        btnPassOubtTask.addActionListener(e-> new PasswordForm(username).show());
        
        
       
        
     
}
public void InboxForm(com.codename1.ui.util.Resources resourceObjectInstance) {
        initGuiBuilderComponents(resourceObjectInstance);
        
        getToolbar().setTitleComponent(
                FlowLayout.encloseCenterMiddle(
                        new Label("Profile Informations","Title")
                        
                        
                )
        );}
//    public static String shuffleString(String a) {
//        List<String> letters = Arrays.asList(a.split(""));
//        Collections.shuffle(letters);
//        return letters.stream().collect(Collectors.joining());
//    }
    private com.codename1.ui.Container gui_Container_1 = new com.codename1.ui.Container(new com.codename1.ui.layouts.BoxLayout(com.codename1.ui.layouts.BoxLayout.Y_AXIS));
    private com.codename1.ui.Label gui_Label_1 = new com.codename1.ui.Label();
                       
               private void initGuiBuilderComponents(com.codename1.ui.util.Resources resourceObjectInstance) {
        setLayout(new com.codename1.ui.layouts.BorderLayout());
          setUIID("password");
//        setTitle("");
//        setName("passwordForm");
        
    }
    
}

    
