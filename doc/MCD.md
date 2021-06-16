```mermaid
classDiagram
    class users{
        usersId
        usersName
        usersEmail
        usersUid
        usersPwd
    }

    class usersGames {
        userId
        gameId
    }

    class games{
        gamesId
        gamesName
        gamesDescription
        gamesLink
        gameCreator
    }

    class categoriesGames {
        categoryId
        gameId
    }

    class categories{
        categoriesId
        categoriesName
    }

    users -- usersGames
    usersGames -- games
    games -- categoriesGames
    categoriesGames -- categories
```
