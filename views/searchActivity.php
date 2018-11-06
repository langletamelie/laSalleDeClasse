<?php include '../header.php'; ?>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <form class="col s10" action="#">
                    <div class="input-field col s12">
                        <select multiple>
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Materialize Multiple Select</label>
                    </div>
                    <button id="connectionButton" class="btn waves-effect waves-light btn-large z-depth-4" type="submit"
                        name="submit">CHERCHER</button>
            </div>
            </form>
        </div>
        </div>
    </main>
    <?php include '../footer.php'; ?>
</body>

</html>