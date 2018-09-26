/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_put_left.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/26 14:12:02 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/26 17:38:24 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

// comment sauvegarder la forme initiale du tetriminos ?

char	**ft_turn_left(t_vars *vars, char **final, int x, int y)
{
    char    **tab;
    
    final = 0;
    tab = vars->tab;
    if (tab[y][x] == '#')
    {
        if (tab[y][x - 1] == '.')
            tab[y][x] = tab[y][x - 1];
    }
    final = tab;
    return (final);
}

void    ft_put_left(t_vars *vars)
{
    char    **tab;
    int     x; // lignes
    int     y; // colonnes
    char     **final; // position finale du tetriminos

    tab = vars->tab;
    y = 0;
    while (y < 4)
    {
        x = 0;
        while (x < 4)
        {
            final = ft_turn_left(vars, final, x, y);
            x++;
        }
        y++;
    }
}