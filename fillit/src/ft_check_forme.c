/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_check_forme.c                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 21:58:45 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/26 21:10:04 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

static int		ft_check_touch(char **tab, int touch, int x, int y)
{
	if (tab[y][x] == '#')
	{
		if (x != 3)
		{
			if (tab[y][x + 1] == '#')
				touch++;
		}
		if (x != 0)
		{
			if (tab[y][x - 1] == '#')
				touch++;
		}
		if (y != 3)
		{
			if (tab[y + 1][x] == '#')
				touch++;
		}
		if (y != 0)
		{
			if (tab[y - 1][x] == '#')
				touch++;
		}
	}
	return (touch);
}

void	ft_check_forme(t_vars *vars, char *tetris)
{
	char	**tab;
	int		x; // = lignes
	int		y; // = colonnes
	int		touch; // liens entre les #

	tab = ft_strsplit(tetris, '\n');
	vars->tab = tab;
    touch = 0;
	y = 0;
	while (y < 4)
	{
		x = 0;
		while (x < 4)
		{
			touch = ft_check_touch(tab, touch, x, y);
			x++;
		}
		y++;
	}
	if (touch != 6 && touch != 8)
    {
		ft_putstr("error.\n");
        exit (0);
    }
}