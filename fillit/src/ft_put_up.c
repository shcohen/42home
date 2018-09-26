/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_put_up.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/26 14:11:42 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/26 21:09:39 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

char     **ft_turn_up(t_vars *vars, char **final, int x, int y)
{
    char    **tab;
    
    final = 0;
    tab = vars->tab;
    if (tab[y][x] == '#')
    {
        if (tab[y - 1][x] == '.')
            tab[y][x] = tab[y - 1][x];
    }
    final = tab;
    return (final);
}

void	ft_put_up(t_vars *vars)
{
    char    **tab;
    int     x; // lignes
    int     y; // colonnes
    char     **final; // position finale du tetriminos

    //printf("%s\n", vars->tab[0]);
    tab = vars->tab;
    y = 0;
    while (y < 4)
    {
        x = 0;
        while (x < 4)
        {
            final = ft_turn_up(vars, final, x, y);
            x++;
        }
        y++;
    }
}