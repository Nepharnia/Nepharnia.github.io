<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="event">Titre</label>
						<input id="event" type="text" required class="form-control" name="event" value="<?= isset($data['event']) ? h($data['event']) : ''; ?>">
						<?php if(isset($errors['name'])): ?>
							<small class="form-text text-muted"><?= $errors['name']; ?></small>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="date">Date</label>
						<input id="date" type="date" required class="form-control"name="date" value="<?= isset($data['date']) ? h($data['date']) : ''; ?>">
						<?php if(isset($errors['date'])): ?>
							<small class="form-text text-muted"><?= $errors['date']; ?></small>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
					<label for="lieu">Lieu de l'évènement</label>
					<textarea name="lieu" id="lieu" class="form-control"><?= isset($data['lieu']) ? h($data['lieu']) : ''; ?></textarea>
				</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="debut">Heure de Début</label>
						<input id="debut" type="time" required class="form-control" name="debut" placeholder="HH:MM" value="<?= isset($data['debut']) ? h($data['debut']) : ''; ?>">
						<?php if(isset($errors['debut'])): ?>
							<small class="form-text text-muted"><?= $errors['debut']; ?></small>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="fin">Heure de Fin</label>
						<input id="fin" type="time" required class="form-control"name="fin" placeholder="HH:MM" value="<?= isset($data['fin']) ? h($data['fin']) : ''; ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="desc">Description</label>
				<textarea name="desc" id="desc" class="form-control"><?= isset($data['desc']) ? h($data['desc']) : ''; ?></textarea>
			</div>