/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Gui;

import Entities.CategorieE;
import Entities.Event;
import Entities.Reservation;
import Entities.User;
import Services.ServiceCategorie;
import Services.ServiceEvent;
import Services.ServiceReservation;
import Services.ServiceUser;
import Utils.Statics;
import com.codename1.components.ImageViewer;
import com.codename1.components.SpanLabel;
import com.codename1.l10n.ParseException;
import com.codename1.l10n.SimpleDateFormat;
import com.codename1.ui.BrowserComponent;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.geom.Dimension;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;


/**
 *
 * @author Omar
 */
public class MyRes extends Form {
    private AllEvent previous;
        private MyRes current;
    private ArrayList<Event> events;
    private ArrayList<User> users;
    private ArrayList<CategorieE> categories;
    private ArrayList<Reservation> rese;
    private EncodedImage enc;
    private EncodedImage enc1;
    private Container eventC;
        Image imgs;
    ImageViewer imgv;
    Image imgs1;
    ImageViewer imgv1;
        public MyRes(Form previous, String username) throws ParseException {
            Container animalC=new Container(BoxLayout.y());
            setTitle("My Event");
       current=this;
                Home t = new Home(username);
        t.addMenu(this, username);
                try {
            enc=EncodedImage.create("/loading.png");
            
        } catch (IOException ex) {
            System.out.println(ex);
        }
        ServiceEvent as=new ServiceEvent();
        ServiceReservation cas=new ServiceReservation();
        events=as.getEvent();
        User u = ServiceUser.getInstance().getUser(username);
        rese=cas.getReservation(u.getId());
        eventC=new Container();
        eventC.setLayout(BoxLayout.y());
                for (Reservation a : rese)
            addEvent(a,username);
                add(eventC);
                getToolbar().addMaterialCommandToRightBar("Retour", FontImage.MATERIAL_ARROW_BACK,  e-> {
                new AllEvent(username).show();
               
            
        });
    }
        private void addEvent(Reservation a, String username) {
        Container animalC=new Container(BoxLayout.y());
        Event ca=null;
        Button remove=new Button("Annuler inscription");
                for (Event c : events) {
                    if (c.getId()==a.getIdE()) {
                        ca=c;
                        break;
                    }
                }
                String img=ca.getPhoto();
               //String qr=ca.getNom();
        String url="http://localhost/baskeltt/web/images/"+img;
     
        System.out.println(url);
        //System.out.println(urlqr);
       // imgqr = URLImage.createToStorage(enc1, urlqr, urlqr ,URLImage.RESIZE_FAIL);
        imgs = URLImage.createToStorage(enc, url, url ,URLImage.RESIZE_SCALE_TO_FILL);
        imgv = new ImageViewer(imgs);
        User u = ServiceUser.getInstance().getUser(username);
        String url1="http://localhost/baskeltt/web/images/"+u.getUsername()+ca.getNom()+".png";
       
        Container C2= new Container(BoxLayout.yCenter());
        remove.addActionListener(e->{
         ServiceReservation rs= new ServiceReservation();

                      rs.delReservation(a.getId());
                     
                      Dialog.show("Evenement", "Vous avez annulé votre insription", new Command("OK"));
            try {
                new MyRes(previous,username).show();
            } catch (ParseException ex) {
            }
        });
        BrowserComponent browser = new BrowserComponent();
            Dimension d = new Dimension(500, 500);
        browser.setSize(d);
        browser.setURL("http://localhost/baskeltt/web/images/"+u.getUsername()+ca.getNom()+".png");
        animalC.addAll(imgv, new Label("Nom: "+ca.getNom()), new SpanLabel("Description : "+ca.getDescription()), new SpanLabel("Date: "+ca.getDateDeb()+" / "+ca.getDateFin()), new SpanLabel("Emplacement: "+ca.getEmplacement()), C2.add(browser), remove);
        animalC.setLeadComponent(remove);
       eventC.add(animalC);
    }
}
