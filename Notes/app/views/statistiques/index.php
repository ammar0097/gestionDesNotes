

<?php require APPROOT . '/views/inc/head.php'; ?> 

<div class="container">
    <section id="our-stats">
	
		<div class="row mb-5">
			<div class="col text-center">
				<h2 class="text-green h1 text-center">Statistiques</h2>
			</div>
		</div>
		
		<div class="row text-center">
			<div class="col">
					<div class="counter">
						<i class="fa fa-users fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="100" data-speed="1500"><?php echo $data['nbUsers']; ?></h2>
                        <p class="count-text ">nombres des users</p>
					</div>
				</a>
			</div>
			<div class="col">
					<div class="counter">
						<i class="fa fa-graduation-cap fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="1700" data-speed="1500"><?php echo $data['nbEtudiants']; ?></h2>
						<p class="count-text ">nombres des étudiants</p>
					</div>
				</a>
			</div>
			<div class="col">
					<div class="counter">
						<i class="fa fa-briefcase fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="11900" data-speed="1500"><?php echo $data['NbEmployes']; ?></h2>
						<p class="count-text ">nombre des employes</p>
					</div>
				</a>
            </div>
            
			<div class="col">
					<div class="counter">
						<i class="fa fa-university fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="157" data-speed="1500"><?php echo $data['nbAdmins']; ?></h2>
						<p class="count-text ">nombre des admins</p>
					</div>
				</a>
			</div>
		</div>
    </section>
   
</div>

<?php require APPROOT . '/views/inc/foot.php'; ?>
