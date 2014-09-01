<?php
/**
	 * Cr�ation de popover bootstrap
	 * - L'identifiant de la popup pour le liens de l'anchor html
	 * - Le trigger : click | hover | focus | manual
	 * - Le placement : top | bottom | left | right
	 * - Le titre
	 * - Le visuel qui active la popover
	 * 
	 */
    function btPopover($id, $trigger, $placement, $titre, $anchor) {
        echo '<a href="#'.$id.'" class="my_popover fade in" rel="popover" 
			data-trigger="'.$trigger.'" 
			data-html="true" 
			data-placement="'.$placement.'" 
			data-original-title="<div align=\'center\'>'.$titre.'</div>" 
			data-content="">
                '.$anchor.'
		</a>';
    }

	/**
	 * Cr�ation de tooltip bootstrap
	 * - Le placement : top | bottom | left | right
	 * - Le texte
	 * - Le trigger : click | hover | focus | manual
	 * - Le visuel qui active le tooltip
	 * 
	 */
    function btBlackTooltip($placement, $text, $trigger, $anchor) {
        echo '<a href="#" class="tooltip-black" data-trigger="'.$trigger.'" data-placement="'.$placement.'" data-title="'.$text.'">';
            echo $anchor;
        echo '</a>';
    }

	/**
	 * Cr�ation d'une popup bootstrap
	 * - Le titre de la popup
	 * - Le contenu de la popup
	 * 
	 */
    function btPopup($titre, $texte) {
        echo '<div class="modal hide fade">';
            echo '<div class="modal-header">';
                echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                echo '<h3>'.$titre.'</h3>';
            echo '</div>';
            echo '<div class="modal-body">';
                echo '<p>'.$texte.'</p>';
            echo '</div>';
            echo '<div class="modal-footer">';
                echo '<a href="#" class="btn">Fermer</a>';
            echo '</div>';
        echo '</div>';
    }

	/**
	 * Cr�ation de label bootstrap
	 * - label / label-important / label-info
	 *   label-success / label-warning / label-inverse
	 * - Le texte
	 * 
	 */
    function btLabel($type, $texte) {
        echo '<span class="label '.$type.'">'.$texte.'</span>';
    }
    
	/**
	 * Cr�ation de badge bootstrap
	 * - badge / badge-important / badge-info
	 *   badge-success / badge-warning / badge-inverse
	 * - Le texte
	 * 
	 */
    function btBadge($type, $texte) {
        echo '<span class="badge '.$type.'">'.$texte.'</span>';
    }

	/**
	 * Cr�ation de boutons bootstrap avec icone
	 * - btn / btn-large / btn-small / btn-mini
	 *   btn-link / btn-primary / btn-info / btn-success / btn-warning / btn-danger / btn-inverse
	 * - "button"
	 * - Le texte
	 * - L'icone
	 * 
	 */
    function btIconBtn($size, $color, $type, $text, $icon) {
        echo '<button class="btn '.$size.' '.$titre.'" type="'.$type.'"><i class="'.$icon.'"> '.$texte.'</button>';
    }
    
	/**
	 * Cr�ation de boutons bootstrap avec icone
	 * - btn / btn-large / btn-small / btn-mini
	 *   btn-link / btn-primary / btn-info / btn-success / btn-warning / btn-danger / btn-inverse
	 * - "button"
	 * - Le texte
	 * - L'icone
	 * 
	 */
    function btBtn($size, $color, $type, $text) {
        echo '<button class="btn '.$size.' '.$titre.'" type="'.$type.'">'.$texte.'</button>';
    }

	/**
	 * Cr�ation d'alertes bootstrap
	 * - alert-error / alert-info / alert-success / alert-warning
	 * - Le titre de l'alerte (En gras)
	 * - Le texte de l'alerte
	 * 
	 */
    function btAlert($type, $titre, $text) {
        echo '<div class="alert '.$type.'">';
            echo '<button type="button" id="closeme" class="close" data-dismiss="alert">&times;</button>';
            echo '<h4>'.$titre.'</h4>
            '.$text;
        echo '</div>';
    }
	
	/**
	 * Cr�ation d'alertes bootstrap
	 * - alert-error / alert-info / alert-success / alert-warning
	 * - Le titre de l'alerte (En gras)
	 * - Le texte de l'alerte
	 * 
	 */
    function btAlertMini($type, $titre, $text) {
        echo '<div class="alert '.$type.'">';
            echo '<strong>'.$titre.'</strong> '.$text;
        echo '</div>';
    }


	/*fonction de connexion la bdd*/     
    function getDbConnexion() {
		return new PDO('mysql:host=mysql51-120.perso; dbname=hrprofil_bdd','hrprofil_bdd','eSkf9fN2hgaB');
    }
	
	function logout() {
	    session_start();
	    unset($_SESSION);
	    session_destroy();
	    header ('Location: http://hr-profiler.fr');
	}
	

	/*function mkmap($dir){
		echo "<ul>";   
		$folder = opendir ($dir);
	   
		while ($file = readdir ($folder)) {   
			if ($file != "." && $file != "..") {           
				$pathfile = $dir.'/'.$file;           
				echo "<li><a href=$pathfile>$file</a></li>";           
				if(filetype($pathfile) == 'dir'){               
					mkmap($pathfile);               
				}           
			}       
		}
		closedir ($folder);    
		echo "</ul>";   
	}*/
?>


