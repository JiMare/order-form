<form method="post" action="api.php">
    <legend>Přepočet měny: </legend>
    <select name="currency" id="currency">
        <option value="Austrálie">Austrálie</option>
        <option value="Brazílie">Brazílie</option>
        <option value="Bulharsko">Bulharsko</option>
        <option value="Čína">Čína</option>
        <option value="Dánsko">Dánsko</option>
        <option value="EMU">EMU</option>
        <option value="Filipíny">Filipíny</option>
        <option value="Hongkong">Hongkong</option>
        <option value="Chorvatsko">Chorvatsko</option>
        <option value="Indie">Indie</option>
        <option value="Indonesie">Indonesie</option>
        <option value="Island">Island</option>
        <option value="Izrael">Izrael</option>
        <option value="Japonsko">Japonsko</option>
        <option value="Jižní Afrika">Jižní Afrika</option>
        <option value="Kanada">Kanada</option>
        <option value="Korejská republika">Korejská republika</option>
        <option value="Maďarsko">Maďarsko</option>
        <option value="Malajsie">Malajsie</option>
        <option value="Mexiko">Mexiko</option>
        <option value="MMF">MMF</option>
        <option value="Norsko">Norsko</option>
        <option value="Nový Zéland">Nový Zéland</option>
        <option value="Polsko">Polsko</option>
        <option value="Rumunsko">Rumunsko"</option>
        <option value="Rusko">Rusko</option>
        <option value="Singapur">Singapur</option>
        <option value="Švédsko">Švédsko</option>
        <option value="Švýcarsko">Švýcarsko</option>
        <option value="Thajsko">Thajsko</option>
        <option value="Turecko">Turecko</option>
        <option value="USA">USA</option>
        <option value="Velká Británie">Velká Británie</option>
    </select>
    <input type="number" value="<?= $totalPrice ?>" name="totalPrice">
    <button type="submit">Přepočítat měnu</button>
</form>