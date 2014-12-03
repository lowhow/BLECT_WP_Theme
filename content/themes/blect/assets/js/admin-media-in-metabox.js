function renderMediaUploader( $triggerElement ) {
    'use strict';
 
    var file_frame, image_data;
    var receiverElement = $triggerElement.attr( 'data-media-uploader-send-to' );

    /**
     * If an instance of file_frame already exists, then we can open it
     * rather than creating a new instance.
     */
    if ( undefined !== file_frame ) {
        file_frame.open();
        return;
     }
 
    /**
     * If we're this far, then an instance does not exist, so we need to
     * create our own.
     *
     * Here, use the wp.media library to define the settings of the Media
     * Uploader. We're opting to use the 'post' frame which is a template
     * defined in WordPress core and are initializing the file frame
     * with the 'insert' state.
     *
     * We're also not allowing the user to select more than one image.
     */
    file_frame = wp.media.frames.file_frame = wp.media({
    	title: 		$triggerElement.attr('data-media-uploader-title'),
        button:   	{ text: $triggerElement.attr('data-media-uploader-button-text') }, 
        multiple: 	false
    })
    .on('select', function(){
    	var attachment = file_frame.state().get('selection').first().toJSON();

    	jQuery( receiverElement ).val( attachment.url );
    	/** Use this to check properties. */
    	//console.log(attachment);
    });   
 
    // Now display the actual file_frame
    file_frame.open();
 
}
 
(function( $ ) {
    'use strict';
 
    $(function() {
        $( '[data-media-uploader-multiple]' ).on( 'click', function( evt ) {
 
            // Stop the anchor's default behavior
            evt.preventDefault();
 
            // Display the media uploader
            renderMediaUploader( $(this) );
 
        });
 
    });
 
})( jQuery );