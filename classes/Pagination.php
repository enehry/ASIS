<?php


Class Pagination{



	public $page_array = array();
	public $page;
	public $per_page;
	public $total_rows;
	public $total_pages;
	public $offset;

	public function setPage($page,$per_page,$total_rows){

	
		$this->page = $page;
		$this->per_page = $per_page;
		$this->total_rows = $total_rows;

		$this->offset = ($page-1)*$this->per_page;


		$this->total_pages = ceil($this->total_rows/$this->per_page);

	
		    // Show dots flag - where to show dots?
	    $dotshow = true;
	    // walk through the list of pages
	    for ( $i = 1; $i <= $this->total_pages; $i++ ){
	       // If first or last page or the page number falls 
	       // within the pagination limit
	       // generate the links for these pages
	       if ($i == 1 || $i == $this->total_pages || 
	             ($i >= $this->page - $this->per_page && 
	             $i <= $this->page + $this->per_page) )
	       {
	          // reset the show dots flag
	          $dotshow = true;
	          // If it's the current page, leave out the link
	          // otherwise set a URL field also
	          if ($i != $this->page)
	              $this->page_array[$i]['url'] = $i;
	          	  $this->page_array[$i]['text'] = strval ($i);
	       }
	       // If ellipses dots are to be displayed
	       // (page navigation skipped)
	       else if ($dotshow == true)
	       {
	           // set it to false, so that more than one 
	           // set of ellipses is not displayed
	           $dotshow = false;
	           $this->page_array[$i]['text'] = "...";
	       }

	    }
		



	}
	public function paginate($link){

		echo '<nav aria-label="...">
			  <ul class="pagination pagination-sm justify-content-center">
			  <li class="page-item';
			  if($this->page == 1){
		        echo ' disabled ';
		      }
		      	echo ' "><a class="page-link" href="';
		     	echo $link;
		      if($this->page == 1){
           		echo $this->page;
		      } else {
		        echo $this->page-1;
		      }
		      echo '"><i class="fa fa-arrow-left"></i></a></li>';

		      foreach ($this->page_array as $page) {
			    // If page has a link
			    if (isset ($page['url'])) {
			    	echo '<li class="page-item"> <a class="page-link" href="';
			    	echo $link;
			    	echo $page['url'].'">';
			    	echo $page['text'];
			    	echo '</a> </li>';
			    } else {
			    	echo '<li class="page-item active"> <span class="page-link">';
			    	echo $page['text'];
			    	echo ' </span> </li>';

			    	
			    	}
			    }
			    echo '<li class="page-item';

			     if($this->page == $this->total_pages OR $this->total_page == 0 OR $this->page ==  ''){
		          echo ' disabled';
		        } echo '"><a class="page-link" href="'.$link;
		          if($this->page == $this->total_pages){
			             echo $this->page;
			        } else {
			             echo $this->page + 1;
			        }
			       echo '"><i class="fa fa-arrow-right"></i></a></li></ul></nav>';

			  


	}
	public function getOffset(){
		return $this->offset;
	}
	public function getPerpage(){
		return $this->per_page;
	}

}
?>