$(document).ready(function() {



    $('.parent_checkbox--all').on('change', function() {
        let child_checkbox = $(this).parents('.role_access').find('.child_checkbox');

        if (this.checked) {
            child_checkbox.each(function(key, el) {
                el.checked = true;
            })
        } else {
            child_checkbox.each(function(key, el) {
                el.checked = false;
            })
        }

    });

    $('.child_checkbox').on('change', function() {

        let checkedAllParent = $(this).parents('.role_access').find('.parent_checkbox--all');
        let checkedItemchild = $(this).parents('.role_access').find('.child_checkbox');


        if ($(this).is(":checked")) { /* checked == true */

            let isAllChecked = 0;

            checkedItemchild.each(function(i, el) {
                if (el.checked == false) {
                    isAllChecked = 1
                }
            })

            if (isAllChecked == 0) {
                checkedAllParent.prop('checked', true);
            }

        } else {
            checkedAllParent.prop('checked', false);
        }

    })



});