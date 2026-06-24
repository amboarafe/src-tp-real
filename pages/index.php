<?php
    include('../inc/functions.php');
    
    $current_sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    
    $next_sort = ($current_sort === 'asc') ? 'desc' : 'asc';

    $departments = get_all_departments($current_sort);
    
?>      
<html>
    <head>
        <title>Les news</title>
        <link rel="stylesheet" href="../design/theme-dark/style.css">
    </head>
    <body>
    <div class="container">
    <h1>Liste des départements</h1>
        <nav class="navbar">
            <p><a href="search.php">🔍 Rechercher un employé</a></p>
            <p><a href="stats.php">📊 Statistiques par emploi</a></p>
            <p><a href="dept_form.php">➕ Ajouter un département</a></p>
            <p><a href="emp_form.php">➕ Ajouter un employé</a></p>
        </nav>
        <table border="1" class="table">
        <tr>
            <th>Department Number</th>
            <th>Department Name</th>
            <th>Manager actuel</th>
            <th>Nombre d'employés</th>
            <th>Action</th>
        </tr>
        <?php foreach ($departments as $line) { ?>
            <tr>
                <td><a href="employees.php?dept_no=<?= urlencode($line['dept_no']) ?>"><?= htmlspecialchars($line['dept_no']) ?></a></td>
                <td><?= htmlspecialchars($line['dept_name']) ?></td>
                <td><?= htmlspecialchars($line['manager_name'] ?? '—') ?></td>
                <td><?= htmlspecialchars($line['nb_employees']) ?></td>
                <td><a href="dept_form.php?dept_no=<?= urlencode($line['dept_no']) ?>">Éditer</a></td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <a href="index.php?sort=<? echo $next_sort ?>">Trier par nom (<? echo $next_sort ?>)</a>
    </body>
</html>