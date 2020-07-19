

<?php require APPROOT . '/views/inc/head.php'; ?> 

<div class="container">
    <section id="our-stats">
		<div class="row mb-5">
			<div class="col text-center">
				<h2 class="text-green h1 text-center">Outstanding Stats</h2>
				<p class="text-uppercase font-italic font-weight-light">counter to count up to a target number</p>
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
						<i class="fa fa-graduation-cap fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="11900" data-speed="1500"><?php echo "+".$data['nbEtudiants24']; ?></h2>
						<p class="count-text ">nombre des etudiants 24h</p>
					</div>
				</a>
            </div>
            
			<div class="col">
					<div class="counter">
						<i class="fa fa-university fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="157" data-speed="1500">157</h2>
						<p class="count-text ">nombre des admins</p>
					</div>
				</a>
			</div>
		</div>
    </section>
    <section id="our-stats">
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
						<i class="fa fa-suitcase fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="11900" data-speed="1500"><?php echo "+".$data['nbEtudiants24']; ?></h2>
						<p class="count-text ">nombre des etudiants 24h</p>
					</div>
				</a>
            </div>
            
			<div class="col">
					<div class="counter">
						<i class="fa fa-university fa-2x text-green"></i>
						<h2 class="timer count-title count-number" data-to="157" data-speed="1500">157</h2>
						<p class="count-text ">nombre des admins</p>
					</div>
				</a>
			</div>
		</div>
	</section>
</div>

<?php require APPROOT . '/views/inc/foot.php'; ?>
