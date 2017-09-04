ConfirmationField
=================

ConfirmationField is a form field for ATK14 applications. It's like the BooleanField (checkbox) but the ConfirmationField must be ticked.

It is the right field for an agreement with terms and conditions in your applications.

Installation
------------

Just use the Composer:

    cd path/to/your/atk14/project/
    composer require atk14/confirmation-field dev-master

Optionally you can create a symlink from vendor to your app:

    ln -s ../../vendor/atk14/confirmation-field/src/confirmation_field.php app/fields/confirmation_field.php

Usage
-----

In a form:

    <?php
    // file: app/forms/orders/create_new_form.php
    class CreateNewForm extends ApplicationForm {

      function set_up(){

        // fileds...

        $this->add_field("confirmation", new ConfirmationField([
          "label" => _("I agree with terms and conditions"),
        ]))->update_message("required","You have to agree with terms and conditions");
      }

      function clean(){
        list($err,$data) = parent::clean();

        // usually it's not required to have the confirmation in the cleaned data
        unset($data["confirmation"]);

        return [$err,$data];
      }
    }


License
-------

ConfirmationField is free software distributed [under the terms of the MIT license](http://www.opensource.org/licenses/mit-license)

<!-- vim: et:ts=2 -->
