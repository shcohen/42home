/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   isometric.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/18 16:52:52 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/19 20:34:06 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

void	ft_iso(t_all *all)
{
	int	x;
	int	y;

	y = 0;
	while (y < all->map.height)
	{
		x = 0;
		while (x < all->map.width)
		{
			ft_iso_x(all, x, y);
			if (y < all->map.height - 1)
			{
				ft_iso_y(all, x, y);
			}
			x++;
		}
		y++;
	}
}

void	ft_iso_x(t_all *all, int x, int y)
{
	all->bres.xi = ((x - y)
		+ (all->map.height / 2 - all->map.width / 2))
		* all->win.ex + (all->win.width / 2) + all->win.rl;
	all->bres.yi = ((x + y)
		- (all->map.height / 2 + all->map.width / 2))
		* all->win.ey + (all->win.height / 2)
		- (double)all->map.tab[y][x] * all->win.ez + all->win.ud;
	if (x < all->map.width - 1)
	{
		all->bres.xf = (((x + 1) - y) + (all->map.height / 2
			- all->map.width / 2)) * all->win.ex
			+ all->win.width / 2 + all->win.rl;
		all->bres.yf = (((x + 1) + y)
			- (all->map.height / 2 + all->map.width / 2))
			* all->win.ey + all->win.height / 2
			- (double)all->map.tab[y][x + 1]
			* all->win.ez + all->win.ud;
		ft_bresenham(all, all->map.tab[y][x]);
	}
}

void	ft_iso_y(t_all *all, int x, int y)
{
	all->bres.xf = ((x - (y + 1))
		+ (all->map.height / 2 - all->map.width / 2))
		* all->win.ex + all->win.width / 2 + all->win.rl;
	all->bres.yf = ((x + (y + 1))
		- (all->map.height / 2 + all->map.width / 2))
		* all->win.ey + all->win.height / 2
		- (double)all->map.tab[y + 1][x]
		* all->win.ez + all->win.ud;
	ft_bresenham(all, all->map.tab[y][x]);
}
