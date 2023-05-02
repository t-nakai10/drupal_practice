<?php

namespace Drupal\training\Form;

use Drupal\Component\Utility\EmailValidator;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * フォーム.
 */
class InfoForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'training_info_form';
  }

  /**
   * test.
   *
   * @var \Drupal\Component\Utility\EmailValidator
   */
  protected $emailValidator;

  /**
   * test.
   */
  public function __construct(EmailValidator $email_validator) {
    $this->emailValidator = $email_validator;
  }

  /**
   * test.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('email.validator')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('email'),
      '#required' => TRUE,
    ];

    $form['colour_select'] = [
      '#type' => 'radios',
      '#title' => $this->t('Pick a colour'),
      '#options' => [
        'black' => $this->t('Black'),
        'other' => $this->t('Other'),
      ],
      '#attributes' => [
        'id' => 'field_colour_select',
      ],
    ];
    $form['custom_color'] = [
      '#type' => 'textfield',
      '#size' => '60',
      '#placeholder' => 'Enter favourite colour',
      '#attributes' => [
        'id' => 'custom-colour',
      ],
      '#states' => [
        'visible' => [
          ':input[id="field_colour_select"]' => ['!value' => 'other'],
        ],
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * バリデーション.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $flag = $this->emailValidator->isValid($name);
    // $flag = \Drupal::service('email.validator')->isValid($name);
    if (!$flag) {
      $form_state->setErrorByName('name', $this->t('Invalid email address.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $email = $form_state->getValue('email');

    $message = $this->t('Name: @name, Email: @email', [
      '@name' => $name,
      '@email' => $email,
    ]);
    $this->messenger()->addMessage($message);

  }

}
