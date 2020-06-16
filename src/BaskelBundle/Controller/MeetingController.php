<?php

namespace BaskelBundle\Controller;

use BaskelBundle\Entity\Meeting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Meeting controller.
 *
 */
class MeetingController extends Controller
{
    /**
     * Lists all meeting entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $meetings = $em->getRepository('BaskelBundle:Meeting')->findAll();

        return $this->render('meeting/index.html.twig', array(
            'meetings' => $meetings,
        ));
    }


    public function calendarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $meeting = $em->getRepository('BaskelBundle:Meeting')->findAll();

        return $this->render('meeting/calendrier.html.twig', array(
            'meeting' => $meeting,
        ));
    }

    /**
     * Creates a new meeting entity.
     *
     */
    public function newAction(Request $request)
    {
        $meeting = new Meeting();
        $form = $this->createForm('BaskelBundle\Form\MeetingType', $meeting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($meeting);
            $em->flush();

            return $this->redirectToRoute('meeting_show', array('id' => $meeting->getId()));
        }

        return $this->render('meeting/new.html.twig', array(
            'meeting' => $meeting,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a meeting entity.
     *
     */
    public function showAction(Meeting $meeting)
    {
        $deleteForm = $this->createDeleteForm($meeting);

        return $this->render('meeting/show.html.twig', array(
            'meeting' => $meeting,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing meeting entity.
     *
     */
    public function editAction(Request $request, Meeting $meeting)
    {
        $deleteForm = $this->createDeleteForm($meeting);
        $editForm = $this->createForm('BaskelBundle\Form\MeetingType', $meeting);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('meeting_edit', array('id' => $meeting->getId()));
        }

        return $this->render('meeting/edit.html.twig', array(
            'meeting' => $meeting,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a meeting entity.
     *
     */
    public function deleteAction(Request $request, Meeting $meeting)
    {
        $form = $this->createDeleteForm($meeting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($meeting);
            $em->flush();
        }

        return $this->redirectToRoute('meeting_index');
    }

    /**
     * Creates a form to delete a meeting entity.
     *
     * @param Meeting $meeting The meeting entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Meeting $meeting)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('meeting_delete', array('id' => $meeting->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
